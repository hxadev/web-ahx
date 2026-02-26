<div class="content">
    <section id="phrase" class="phrase lazy-background" aria-label="Inspirational quote">
        <div class="phrase__overlay"></div>
        <div class="phrase__container">
            <figure class="phrase__quote" data-aos="fade-up" data-aos-duration="800">
                <span class="phrase__mark phrase__mark--open" aria-hidden="true">&ldquo;</span>
                <blockquote class="phrase__text">
                    <p>{{ $phrase->content }}</p>
                </blockquote>
                <span class="phrase__mark phrase__mark--close" aria-hidden="true">&rdquo;</span>
                <figcaption class="phrase__author" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
                    <span class="phrase__author-dash" aria-hidden="true"></span>
                    <cite>{{ $phrase->author }}</cite>
                </figcaption>
            </figure>
        </div>
    </section>
</div>
