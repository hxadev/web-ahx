#!/usr/bin/env bash
set -euo pipefail

# ─────────────────────────────────────────────
#  HXA Portfolio — Install & Deploy to Railway
# ─────────────────────────────────────────────

GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
CYAN='\033[0;36m'
BOLD='\033[1m'
NC='\033[0m'

step()  { echo -e "\n${CYAN}${BOLD}▶ $1${NC}"; }
ok()    { echo -e "${GREEN}✔ $1${NC}"; }
warn()  { echo -e "${YELLOW}⚠ $1${NC}"; }
error() { echo -e "${RED}✘ $1${NC}"; exit 1; }

require_cmd() {
    command -v "$1" &>/dev/null || error "'$1' is not installed. Please install it before running this script."
}

# ─── Prerequisites ───────────────────────────
step "Checking prerequisites"
require_cmd php
require_cmd composer
require_cmd node
require_cmd npm
require_cmd railway
ok "All prerequisites found"

# Print versions
echo "  PHP:      $(php --version | head -n1)"
echo "  Composer: $(composer --version --no-ansi)"
echo "  Node:     $(node --version)"
echo "  npm:      $(npm --version)"
echo "  Railway:  $(railway --version 2>/dev/null || echo 'unknown')"

# ─── Environment setup ───────────────────────
step "Setting up environment"
if [ ! -f .env ]; then
    cp .env.example .env
    warn ".env created from .env.example — review it before deploying"
fi

if ! grep -q "^APP_KEY=.\+" .env; then
    php artisan key:generate --ansi
    ok "APP_KEY generated"
else
    ok "APP_KEY already set"
fi

# ─── PHP dependencies ────────────────────────
step "Installing PHP dependencies (composer)"
composer install --no-dev --optimize-autoloader --no-interaction
ok "Composer dependencies installed"

# ─── Node dependencies ───────────────────────
step "Installing Node dependencies (npm)"
if [ -f package-lock.json ]; then
    npm ci
else
    npm install
fi
ok "Node dependencies installed"

# ─── Frontend build ──────────────────────────
step "Building frontend assets for production"
npm run prod
ok "Frontend assets compiled"

# ─── Storage link ────────────────────────────
step "Linking storage"
php artisan storage:link --force 2>/dev/null || true
ok "Storage linked"

# ─── Laravel optimizations ───────────────────
step "Caching Laravel config / routes / views"
php artisan config:cache
php artisan route:cache
php artisan view:cache
ok "Laravel optimizations applied"

# ─── Railway login check ─────────────────────
step "Checking Railway authentication"
if ! railway whoami &>/dev/null; then
    warn "Not logged in to Railway. Starting login..."
    railway login
fi
ok "Authenticated with Railway"

# ─── Set required Railway env vars ───────────
step "Syncing critical environment variables to Railway"

APP_KEY_VALUE=$(grep "^APP_KEY=" .env | cut -d '=' -f2-)
MONGO_URI=$(grep "^MONGODB_URI\|^DB_URI" .env | cut -d '=' -f2- || true)

railway variables set \
    APP_ENV=production \
    APP_DEBUG=false \
    APP_KEY="${APP_KEY_VALUE}" \
    LOG_CHANNEL=stderr \
    CACHE_DRIVER=file \
    SESSION_DRIVER=file \
    QUEUE_CONNECTION=sync \
    --yes 2>/dev/null || warn "Could not set some env vars — set them manually in the Railway dashboard"

ok "Environment variables synced"

# ─── Deploy ──────────────────────────────────
step "Deploying to Railway"
railway up --detach

echo -e "\n${GREEN}${BOLD}════════════════════════════════════════${NC}"
echo -e "${GREEN}${BOLD}  Deployment triggered successfully!  ${NC}"
echo -e "${GREEN}${BOLD}════════════════════════════════════════${NC}"
echo ""
echo -e "  Monitor logs:   ${CYAN}railway logs${NC}"
echo -e "  Open app:       ${CYAN}railway open${NC}"
echo -e "  Dashboard:      ${CYAN}https://railway.app/dashboard${NC}"
echo ""
warn "Double-check these env vars in the Railway dashboard:"
echo "  • APP_URL       → your Railway-assigned domain"
echo "  • MONGODB_HOST  → mongodb.railway.internal"
echo "  • MONGODB_PORT  → 27017"
echo "  • MONGODB_DATABASE, MONGODB_USERNAME, MONGODB_PASSWORD"
echo ""
