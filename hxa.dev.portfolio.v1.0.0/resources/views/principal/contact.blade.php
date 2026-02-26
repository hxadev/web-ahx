<div class="content">
    <section id="contact" class="contact" aria-label="Contact">
        <div class="contact__container">

            {{-- Section Header --}}
            <div class="contact__header" data-aos="fade-up">
                <h2 class="section-title section-title--light">
                    <i class="fas fa-paper-plane"></i>
                    {{ __('contact.title') }}
                </h2>
                <p class="contact__description">{{ __('contact.description') }}</p>
            </div>

            <div class="contact__body">

                {{-- Left Column: Contact Info --}}
                <aside class="contact__info" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="contact__info-title">{{ __('contact.info.title') }}</h3>
                    <p class="contact__info-text">{{ __('contact.info.text') }}</p>

                    <ul class="contact__details">
                        <li class="contact__detail">
                            <span class="contact__detail-icon" aria-hidden="true">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <div>
                                <strong>{{ __('contact.info.email') }}</strong>
                                <a href="mailto:hxa.dev@gmail.com">hxa.dev@gmail.com</a>
                            </div>
                        </li>
                        <li class="contact__detail">
                            <span class="contact__detail-icon" aria-hidden="true">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                            <div>
                                <strong>{{ __('contact.info.phone') }}</strong>
                                <a href="tel:+522461847899">+52 246 184 7899</a>
                            </div>
                        </li>
                        <li class="contact__detail">
                            <span class="contact__detail-icon" aria-hidden="true">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <div>
                                <strong>{{ __('contact.info.location') }}</strong>
                                <span>CDMX | Tlaxcala, México</span>
                            </div>
                        </li>
                    </ul>

                    {{-- Social links --}}
                    <div class="contact__social">
                        <a href="https://github.com/AlfonsHX" target="_blank" rel="noopener noreferrer" aria-label="GitHub" class="contact__social-link">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/alfonso-hern%C3%A1ndez-xochipa-245711142/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="contact__social-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </aside>

                {{-- Right Column: Form --}}
                <div class="contact__form-wrapper" data-aos="fade-up" data-aos-delay="200">
                    <form class="contact__form" id="contact-form" novalidate>

                        <div class="contact__form-row">
                            <div class="contact__field">
                                <label for="contactName" class="contact__label">{{ __('contact.form.name') }}</label>
                                <input type="text"
                                       class="contact__input"
                                       id="contactName"
                                       name="name"
                                       placeholder="{{ __('contact.form.name_placeholder') }}"
                                       required
                                       autocomplete="name">
                            </div>
                            <div class="contact__field">
                                <label for="contactEmail" class="contact__label">{{ __('contact.form.email') }}</label>
                                <input type="email"
                                       class="contact__input"
                                       id="contactEmail"
                                       name="email"
                                       placeholder="{{ __('contact.form.email_placeholder') }}"
                                       required
                                       autocomplete="email">
                            </div>
                        </div>

                        <div class="contact__field">
                            <label for="contactSubject" class="contact__label">{{ __('contact.form.subject') }}</label>
                            <input type="text"
                                   class="contact__input"
                                   id="contactSubject"
                                   name="subject"
                                   placeholder="{{ __('contact.form.subject_placeholder') }}">
                        </div>

                        <div class="contact__field">
                            <label for="contactMessage" class="contact__label">{{ __('contact.form.message') }}</label>
                            <textarea class="contact__input contact__textarea"
                                      id="contactMessage"
                                      name="message"
                                      rows="5"
                                      placeholder="{{ __('contact.form.message_placeholder') }}"
                                      required></textarea>
                        </div>

                        <button type="submit" class="contact__submit" id="contact-submit">
                            <i class="fas fa-paper-plane"></i>
                            <span>{{ __('contact.form.button') }}</span>
                        </button>

                    </form>
                </div>

            </div>

        </div>
    </section>
</div>
