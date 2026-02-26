<nav id="nav" class="nav" role="navigation" aria-label="Main navigation">
    <div class="nav-inner">
        {{-- Logo / Brand --}}
        <a href="/main" class="nav-brand">
            <span class="nav-brand__symbol">&lt;/&gt;</span>
            <span class="nav-brand__text">hxa<span class="nav-brand__accent">.dev</span></span>
        </a>

        {{-- Desktop menu links --}}
        @if (Request::is('main'))
            <div class="nav-links" id="nav-links">
                @foreach ($menu as $menuItem)
                    @if ($menuItem->isVisible)
                        <a data-id="{{ $menuItem->id }}"
                        href="#{{ $menuItem->link }}"
                        class="nav-link main"
                        aria-label="{{ $menuItem->name }}">
                            <i class="{{ $menuItem->icon }}"></i>
                            <span>{{ $menuItem->name }}</span>
                        </a>
                    @endif  
                @endforeach
            </div>
        @endif

        @if (Request::is('project/*'))
            <div class="nav-links" id="nav-links">
                <a href="/main#portfolio" class="nav-link main" aria-label="Volver">
                    <i class="fa fa-arrow-left"></i>
                    <span>{{ __('nav.back') ?? 'Volver' }}</span>
                </a>
            </div>
        @endif

        {{-- Hamburger button (mobile) --}}
        <button class="nav-toggle" id="btn-menu-responsive" aria-label="Toggle menu" aria-expanded="false" aria-controls="nav-mobile">
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
            <span class="nav-toggle__bar"></span>
        </button>
    </div>

    {{-- Mobile overlay menu --}}
    <div class="nav-mobile" id="nav-mobile" aria-hidden="true">
        <div class="nav-mobile__inner">
            @if (Request::is('main'))
                @foreach ($menu as $menuItem)
                    @if ($menuItem->isVisible)
                        <a data-id="{{ $menuItem->id }}"
                        href="#{{ $menuItem->link }}"
                        class="nav-mobile__link main">
                            <i class="{{ $menuItem->icon }}"></i>
                            <span>{{ $menuItem->name }}</span>
                        </a>
                    @endif
                @endforeach
            @endif

            @if (Request::is('project/*'))
                <a href="/main#portfolio" class="nav-mobile__link main">
                    <i class="fa fa-arrow-left"></i>
                    <span>{{ __('nav.back') ?? 'Volver' }}</span>
                </a>
            @endif
        </div>
    </div>
</nav>
