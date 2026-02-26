<div class="content">
<section id="aboutMe" class="about" aria-label="About me">
    <div class="about__container">

        {{-- Section Header --}}
        <div class="about__header" data-aos="fade-up">
            <h2 class="section-title">
                <span class="about__code-tag">&lt;</span>{{ __('about.bio.label') }}<span class="about__code-tag">/&gt;</span>
            </h2>
        </div>

        {{-- ========================================
             TOP: Split — Bio Left + Stats Right
             ======================================== --}}
        <div class="about__intro">

            {{-- Left: Bio --}}
            <div class="about__bio" data-aos="fade-right" data-aos-delay="100">
                <!--<div class="about__bio-label">
                    <span class="about__code-tag">&lt;</span>{{ __('about.bio.label') }}<span class="about__code-tag">/&gt;</span>
                </div>-->
                <h3 class="about__headline">{!! __('about.bio.headline') !!}</h3>
                <p class="about__bio-text">{{ __('about.bio.text', ['experience' => $experience]) }}</p>
                <div class="about__cta-row">
                    <!--<a class="about__cta-link" data-toggle="modal" data-target="#mdl_resume" role="button">
                        <i class="fas fa-file-alt"></i> {{ __('about.bio.resume') }}
                    </a>-->
                    <a href="#contact" class="about__cta-link about__cta-link--ghost">
                        <i class="fas fa-paper-plane"></i> {{ __('about.bio.contact') }}
                    </a>
                </div>
            </div>

            {{-- Right: Stats counters --}}
            <div class="about__stats" data-aos="fade-left" data-aos-delay="200">
                <div class="about__stat">
                    <span class="about__stat-number">{{ $experience }}+</span>
                    <span class="about__stat-label">{{ __('about.stats.experience') }}</span>
                </div>
                <div class="about__stat">
                    <span class="about__stat-number">20+</span>
                    <span class="about__stat-label">{{ __('about.stats.projects') }}</span>
                </div>
                <div class="about__stat">
                    <span class="about__stat-number">10+</span>
                    <span class="about__stat-label">{{ __('about.stats.technologies') }}</span>
                </div>
                <div class="about__stat">
                    <span class="about__stat-number">5+</span>
                    <span class="about__stat-label">{{ __('about.stats.clients') }}</span>
                </div>
            </div>

        </div>

        {{-- ========================================
             TECH STACK — Badges grid
             ======================================== --}}
        <div class="about__stack" data-aos="fade-up" data-aos-delay="200">
            <h3 class="about__section-label">{{ __('about.stack.title') }}</h3>
            <div class="about__stack-grid">
                {{-- Backend --}}
                <div class="tech-badge" title="Laravel">
                    <i class="devicon-laravel-plain"></i><span>Laravel</span>
                </div>
                <div class="tech-badge" title="PHP">
                    <i class="devicon-php-plain"></i><span>PHP</span>
                </div>
                <div class="tech-badge" title="Node.js">
                    <i class="devicon-nodejs-plain"></i><span>Node.js</span>
                </div>
                <div class="tech-badge" title="Java">
                    <i class="devicon-java-plain"></i><span>Java</span>
                </div>
                <div class="tech-badge" title="Spring">
                    <i class="devicon-spring-plain"></i><span>Spring</span>
                </div>
                {{-- Databases --}}
                <div class="tech-badge" title="MongoDB">
                    <i class="devicon-mongodb-plain"></i><span>MongoDB</span>
                </div>
                <div class="tech-badge" title="MySQL">
                    <i class="devicon-mysql-plain"></i><span>MySQL</span>
                </div>
                <div class="tech-badge" title="PostgreSQL">
                    <i class="devicon-postgresql-plain"></i><span>PostgreSQL</span>
                </div>
                {{-- Frontend --}}
                <div class="tech-badge" title="JavaScript">
                    <i class="devicon-javascript-plain"></i><span>JavaScript</span>
                </div>
                <div class="tech-badge" title="React">
                    <i class="devicon-react-original"></i><span>React</span>
                </div>
                {{-- DevOps / Tools --}}
                <div class="tech-badge" title="Docker">
                    <i class="devicon-docker-plain"></i><span>Docker</span>
                </div>
                <div class="tech-badge" title="Git">
                    <i class="devicon-git-plain"></i><span>Git</span>
                </div>
                <div class="tech-badge" title="Linux">
                    <i class="devicon-linux-plain"></i><span>Linux</span>
                </div>
            </div>
        </div>

        {{-- ========================================
             SERVICE CARDS — What I do
             ======================================== --}}
        <div class="about__services" data-aos="fade-up" data-aos-delay="100">
            <h3 class="about__section-label">{{ __('about.services.title') }}</h3>
            <div class="about__cards">
                @foreach($services as $service)
                    @if ($service->isEnabled)
                        <article class="service-card" data-aos="fade-up" data-aos-delay="{{ 80 + $loop->index * 80 }}">
                            <div class="service-card__accent" aria-hidden="true"></div>
                            <div class="service-card__icon">
                                @foreach($service->icons as $icon)
                                    <i class="{{ $icon }}"></i>
                                @endforeach
                            </div>
                            <h4 class="service-card__title">{{ $service->title }}</h4>
                            <p class="service-card__text">{{ $service->content }}</p>
                        </article>
                    @endif
                    
                @endforeach
            </div>
        </div>

    </div>
</section>
</div>
