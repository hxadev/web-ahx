{{-- ============================================
     PROJECT DETAIL PAGE
     Dark showcase layout with hero banner,
     meta sidebar, and content sections
     ============================================ --}}

@if ($project->active)
<article class="pj" aria-label="{{ $project->name }}">

    {{-- ========================================
         HERO — Full-width banner with overlay
         ======================================== --}}
    <header class="pj__hero">
        <div class="pj__hero-bg">
            @if($project->image)
                <img class="pj__hero-img" src="data:image/png;base64,{{ $project->image }}" alt="{{ $project->name }}">
            @endif
            <div class="pj__hero-overlay"></div>
        </div>

        <div class="pj__hero-content">
            {{-- Breadcrumb --}}
            <nav class="pj__breadcrumb" aria-label="Breadcrumb">
                <a href="/principal#portfolio" class="pj__breadcrumb-link">
                    <i class="fas fa-arrow-left"></i>
                    {{ __('project.back') }}
                </a>
                <span class="pj__breadcrumb-sep">/</span>
                <span class="pj__breadcrumb-current">{{ $project->name }}</span>
            </nav>

            {{-- Project type badge --}}
            <div class="pj__hero-meta">
                <span class="pj__badge">
                    @foreach ($project->icons_type as $icon)
                        <i class="{{ $icon }}"></i>
                    @endforeach
                    {{ $project->type }}
                </span>
                @if($project->date)
                    <span class="pj__date">
                        <i class="far fa-calendar-alt"></i>
                        {{ $project->date }}
                    </span>
                @endif
            </div>

            {{-- Title --}}
            <h1 class="pj__title">{{ $project->name }}</h1>

            {{-- Description --}}
            @if($project->details && $project->details->description)
                <p class="pj__subtitle">{{ $project->details->description }}</p>
            @endif

            {{-- Tech stack pills --}}
            @if($project->details && $project->details->icons_techs)
                <div class="pj__techs">
                    @foreach ($project->details->icons_techs as $tech)
                        <span class="pj__tech-pill">
                            <i class="{{ $tech }}"></i>
                        </span>
                    @endforeach
                </div>
            @endif
        </div>
    </header>

    {{-- ========================================
         BODY — Content sections
         ======================================== --}}
    <div class="pj__body">
        <div class="pj__container">

            {{-- Overview --}}
            @if($project->details && $project->details->overview)
                <section class="pj__section" data-aos="fade-up">
                    <div class="pj__section-header">
                        <span class="pj__section-icon"><i class="fas fa-eye"></i></span>
                        <h2 class="pj__section-title">{{ __('project.overview') }}</h2>
                    </div>
                    <div class="pj__section-content">
                        <p>{{ $project->details->overview }}</p>
                    </div>
                </section>
            @endif

            {{-- Challenge --}}
            @if($project->details && $project->details->challenge)
                <section class="pj__section" data-aos="fade-up">
                    <div class="pj__section-header">
                        <span class="pj__section-icon"><i class="fas fa-puzzle-piece"></i></span>
                        <h2 class="pj__section-title">{{ __('project.challenge') }}</h2>
                    </div>
                    <div class="pj__section-content">
                        <p>{{ $project->details->challenge }}</p>
                    </div>
                </section>
            @endif

            {{-- Requirements --}}
            @if($project->details && $project->details->requirements)
                <section class="pj__section" data-aos="fade-up">
                    <div class="pj__section-header">
                        <span class="pj__section-icon"><i class="fas fa-clipboard-list"></i></span>
                        <h2 class="pj__section-title">{{ __('project.requirements') }}</h2>
                    </div>
                    <div class="pj__section-content">
                        <p>{{ $project->details->requirements }}</p>
                    </div>
                </section>
            @endif

            {{-- Solution --}}
            @if($project->details && $project->details->solution)
                <section class="pj__section" data-aos="fade-up">
                    <div class="pj__section-header">
                        <span class="pj__section-icon"><i class="fas fa-lightbulb"></i></span>
                        <h2 class="pj__section-title">{{ __('project.solution') }}</h2>
                    </div>
                    <div class="pj__section-content">
                        <p>{{ $project->details->solution }}</p>
                    </div>
                </section>
            @endif

            {{-- Tech Stack detailed --}}
            @if($project->details && $project->details->icons_techs)
                <section class="pj__section pj__section--stack" data-aos="fade-up">
                    <div class="pj__section-header">
                        <span class="pj__section-icon"><i class="fas fa-layer-group"></i></span>
                        <h2 class="pj__section-title">{{ __('project.stack') }}</h2>
                    </div>
                    <div class="pj__stack-grid">
                        @foreach ($project->details->icons_techs as $tech)
                            <div class="pj__stack-item">
                                <i class="{{ $tech }}"></i>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

        </div>
    </div>

    {{-- ========================================
         FOOTER CTA — Back to portfolio
         ======================================== --}}
    <div class="pj__cta" data-aos="fade-up">
        <a href="/principal#portfolio" class="pj__cta-btn">
            <i class="fas fa-th-large"></i>
            {{ __('project.all_projects') }}
        </a>
    </div>

</article>
@else
    <div class="pj pj--empty">
        <div class="pj__container">
            <div class="pj__empty">
                <i class="fas fa-exclamation-triangle"></i>
                <p>{{ __('project.not_found') }}</p>
                <a href="/principal#portfolio" class="pj__cta-btn">
                    <i class="fas fa-arrow-left"></i>
                    {{ __('project.back') }}
                </a>
            </div>
        </div>
    </div>
@endif
