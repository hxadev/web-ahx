<footer class="footer" role="contentinfo">
    <div class="footer__inner">

        {{-- Top row: brand + nav + contact + social --}}
        <div class="footer__top">

            {{-- Brand --}}
            <div class="footer__brand">
                <a href="/principal" class="footer__logo" aria-label="hxa.dev home">
                    <span class="footer__logo-symbol">&lt;/&gt;</span>
                    <span class="footer__logo-text">hxa<span class="footer__logo-accent">.dev</span></span>
                </a>
                <p class="footer__tagline">{{ __('footer.tagline') }}</p>
            </div>

            {{-- Quick links --}}
            <nav class="footer__nav" aria-label="Footer navigation">
                <h4 class="footer__heading">{{ __('footer.nav') }}</h4>
                <ul class="footer__nav-list">
                    @if(isset($menu) && Request::is('principal'))
                        @foreach($menu as $menuItem)
                            <li>
                                <a href="#{{ $menuItem->link }}" class="footer__nav-link">{{ $menuItem->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </nav>

            {{-- Contact info --}}
            <div class="footer__contact">
                <h4 class="footer__heading">{{ __('footer.contact') }}</h4>
                <ul class="footer__contact-list">
                    <li>
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:hxa.dev@gmail.com">hxa.dev@gmail.com</a>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt" aria-hidden="true"></i>
                        <a href="tel:+522461847899">+52 246 184 7899</a>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        <span>CDMX | Tlaxcala, México</span>
                    </li>
                </ul>
            </div>

            {{-- Social --}}
            <div class="footer__social">
                <h4 class="footer__heading">{{ __('footer.social') }}</h4>
                <div class="footer__social-links">
                    <a href="https://github.com/AlfonsHX" target="_blank" rel="noopener noreferrer" aria-label="GitHub" class="footer__social-link">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/alfonso-hern%C3%A1ndez-xochipa-245711142/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="footer__social-link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

        </div>

        {{-- Divider --}}
        <hr class="footer__divider" aria-hidden="true">

        {{-- Bottom row: copyright --}}
        <div class="footer__bottom">
            <span class="footer__copy">&copy; {{ date('Y') }} hxa.dev &mdash; {{ __('footer.copy') }}</span>
        </div>

    </div>
</footer>
