<section id="particles-js" class="hero lazy-background">

    <section id="hero" aria-label="Hero introduction">
        <div class="hero-split">

            {{-- LEFT COLUMN — Text --}}
            <div class="hero-split__text">

                <!--<p class="hero__greeting" data-aos="fade-right" data-aos-duration="600">
                    {{ __('hero.greeting') }}
                </p>-->

                <h1 class="hero__name" data-aos="fade-right" data-aos-duration="600" data-aos-delay="120">
                    {!! __('hero.name_html') !!}
                </h1>

                <h2 class="hero__role" data-aos="fade-right" data-aos-duration="600" data-aos-delay="240">
                    {{ __('hero.position') }}
                </h2>

                <p class="hero__tagline" data-aos="fade-right" data-aos-duration="600" data-aos-delay="360">
                    {{ __('hero.tagline') }}
                </p>

                <!--<div class="hero__cta" data-aos="fade-right" data-aos-duration="600" data-aos-delay="480">
                    <a class="hero__btn hero__btn--primary" data-toggle="modal" data-target="#mdl_resume" role="button">
                        <i class="fas fa-file-alt"></i>
                        <span>{{ __('hero.button.cv') }}</span>
                    </a>
                    <a href="#portfolio" class="hero__btn hero__btn--ghost" role="button">
                        <span>{{ __('hero.button.portfolio') }}</span>
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </div>-->

                {{-- Scroll indicator --}}
                <div class="hero__scroll" data-aos="fade-up" data-aos-delay="800" data-aos-duration="600">
                    <a href="#aboutMe" class="hero__scroll-link" aria-label="Scroll down">
                        <span class="hero__scroll-icon">
                            <span class="hero__scroll-dot"></span>
                        </span>
                        <span class="hero__scroll-text">{{ __('hero.button.discover') }}</span>
                    </a>
                </div>

            </div>

            {{-- RIGHT COLUMN — Avatar frame --}}
            <div class="hero-split__visual" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <div class="hero__frame">
                    <div class="hero__frame-glow" aria-hidden="true"></div>
                    <div class="hero__frame-border">
                        <img class="lozad hero__avatar-img"
                             data-src="{{ URL::asset('/img/principal/hero/avatar.jpg') }}"
                             alt="Alfonso Hernández Xochipa - Software Engineer">
                    </div>
                </div>
            </div>

        </div>
    </section>

</section>

<!-- Begin Social Bar -->
<nav data-aos="fade-right" data-aos-delay="800" class="social" aria-label="Social media links">
    <ul>
        <li>
            <a href="https://www.linkedin.com/in/alfonso-hernandez-xochipa-a500ba190" target="_blank" rel="noopener noreferrer" class="icon-linkedin" aria-label="LinkedIn profile">
                <i class="fab fa-linkedin"></i>
            </a>
        </li>
        <li>
            <a href="https://github.com/posihx" target="_blank" rel="noopener noreferrer" class="icon-github" aria-label="GitHub profile">
                <i class="fab fa-github"></i>
            </a>
        </li>
        <li>
            <a href="#contact" class="icon-mail" aria-label="Contact me">
                <i class="fas fa-envelope"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- End Social Bar -->

<div id="config-panel" class="config-panel">
    <div class="panel-inner">
        <a state="OFF" id="config-button" class="config-button" role="button" aria-label="Open settings panel">
            <i class="fas fa-cog"></i>
        </a>
        <div class="config-section">
            <h4>{{ __('options.optionColor') }}</h4>
            <ul class="chooseColor">
                <li data-theme="1" class="theme-1"><a aria-label="Green theme"></a></li>
                <li data-theme="2" class="theme-2"><a aria-label="Blue theme"></a></li>
                <li data-theme="3" class="theme-3"><a aria-label="Indigo theme"></a></li>
                <li data-theme="4" class="theme-4"><a aria-label="Lime theme"></a></li>
                <li data-theme="5" class="theme-5"><a aria-label="Orange theme"></a></li>
                <li data-theme="6" class="theme-6"><a aria-label="Purple theme"></a></li>
            </ul>
        </div>
        <hr />
        <div class="config-section">
            <h4>{{ __('options.optionDarkMode') }}</h4>
            <label class="switch-button">
                <input type="checkbox" @if($typeTheme==='dark') checked='checked' @endif aria-label="Toggle dark mode">
                <span class="slider round"></span>
            </label>
        </div>
        <hr>
        <div class="config-section">
            <h4>{{ __('options.optionLanguaje') }}</h4>
            <ul class="chooseLanguage">
                <li>
                    <a href="{{ url('/locale/es') }}" aria-label="Cambiar a Español">
                        <img class="lozad" data-src="{{ URL::asset('img/icons/lang-es.svg') }}" alt="Español">
                    </a>
                </li>
                <li>
                    <a href="{{ url('/locale/en') }}" aria-label="Switch to English">
                        <img class="lozad" data-src="{{ URL::asset('img/icons/lang-eng.svg') }}" alt="English">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
