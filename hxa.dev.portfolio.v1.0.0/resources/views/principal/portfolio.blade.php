<div class="content">
    <section id="portfolio" class="portfolio" aria-label="Project portfolio">

        {{-- Dark decorative background --}}
        <div class="portfolio__bg" aria-hidden="true">
            <div class="portfolio__bg-glow"></div>
        </div>

        <div class="portfolio__container">

            {{-- Section Header --}}
            <div class="portfolio__header" data-aos="fade-up">
                <div class="portfolio__label">
                    <span class="portfolio__code-tag">&lt;</span>{{ __('portfolio.label') }}<span class="portfolio__code-tag">/&gt;</span>
                </div>
                <h2 class="portfolio__title">
                    {!! __('portfolio.title_html') !!}
                </h2>
                <p class="portfolio__description">{{ __('portfolio.description') }}</p>
            </div>

            {{-- Featured project (first active) --}}
            @php
                $activeProjects = $projects->filter(fn($p) => $p->active);
                $featured = $activeProjects->first();
                $rest = $activeProjects->skip(1);
            @endphp

            @if($featured)
                <div class="portfolio__featured" data-aos="fade-up" data-aos-delay="100">
                    <a href="project/{{ $featured->id }}" class="featured-card" aria-label="View project: {{ $featured->name }}">
                        <div class="featured-card__image">
                            <img class="lozad"
                                 data-src="data:image/png;base64,{{ $featured->image }}"
                                 alt="{{ $featured->name }}">
                            <div class="featured-card__overlay">
                                <span class="featured-card__badge">{{ __('portfolio.featured') }}</span>
                            </div>
                        </div>
                        <div class="featured-card__content">
                            <div class="featured-card__meta">
                                <span class="featured-card__type">
                                    @foreach($featured->icons_type ?? [] as $icon)
                                        <i class="{{ $icon }}"></i>
                                    @endforeach
                                    {{ $featured->type }}
                                </span>
                                @if($featured->date)
                                    <span class="featured-card__date">{{ $featured->date }}</span>
                                @endif
                            </div>
                            <h3 class="featured-card__name">{{ $featured->name }}</h3>
                            @if($featured->details && $featured->details->description)
                                <p class="featured-card__desc">{{ Str::limit($featured->details->description, 160) }}</p>
                            @endif
                            <div class="featured-card__footer">
                                @if($featured->details && $featured->details->icons_techs)
                                    <div class="featured-card__techs">
                                        @foreach(array_slice($featured->details->icons_techs, 0, 5) as $tech)
                                            <i class="{{ $tech }}" title="{{ $tech }}"></i>
                                        @endforeach
                                    </div>
                                @endif
                                <span class="featured-card__action">
                                    {{ __('portfolio.view') }} <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            {{-- Grid: remaining projects --}}
            <div class="portfolio__grid" id="portfolio-grid">
                @foreach ($rest as $project)
                    <article class="project-card" data-aos="fade-up" data-aos-delay="{{ 80 + $loop->index * 80 }}">
                        <a href="project/{{ $project->id }}" class="project-card__link" aria-label="View project: {{ $project->name }}">
                            <div class="project-card__image">
                                <img class="lozad"
                                     data-src="data:image/png;base64,{{ $project->image }}"
                                     alt="{{ $project->name }}">
                                <div class="project-card__overlay">
                                    <span class="project-card__view">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="project-card__body">
                                <div class="project-card__meta">
                                    <span class="project-card__type">
                                        @foreach($project->icons_type ?? [] as $icon)
                                            <i class="{{ $icon }}"></i>
                                        @endforeach
                                        {{ $project->type }}
                                    </span>
                                    @if($project->date)
                                        <span class="project-card__date">{{ $project->date }}</span>
                                    @endif
                                </div>
                                <h3 class="project-card__name">{{ $project->name }}</h3>
                                @if($project->details && $project->details->icons_techs)
                                    <div class="project-card__techs">
                                        @foreach(array_slice($project->details->icons_techs, 0, 4) as $tech)
                                            <i class="{{ $tech }}"></i>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <nav class="portfolio__pagination" id="portfolio-pagination" aria-label="Portfolio pages">
                {{-- JS injects page buttons --}}
            </nav>

        </div>
    </section>
</div>
