<x-layout>
    <!-- Contact Hero Section -->
    <x-hero-section title="Contact Doros Online"
                    description="We're here to help and answer any questions you might have"
                    />

    <!-- Contact Content -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-md-6">
                    <div class="card shadow contact-card">
                        <div class="card-body p-4">
                            <h3 class="mb-4">Send us a message</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-md-6">
                    <div class="card shadow contact-card">
                        <div class="card-body p-4">
                            <h3 class="mb-4">Get in touch</h3>

                            <!-- Address -->
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h5>Our Office</h5>
                                    <p>123 Education Street<br>Knowledge City, LN 4567</p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h5>Email Us</h5>
                                    <p>contact@dorosonline.com<br>support@dorosonline.com</p>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h5>Call Us</h5>
                                    <p>+1 (555) 123-4567<br>Mon-Fri, 9am-5pm EST</p>
                                </div>
                            </div>

                            <!-- Social Media -->
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="fas fa-share-alt"></i>
                                </div>
                                <div>
                                    <h5>Follow Us</h5>
                                    <div class="d-flex gap-3 mt-3">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <i class="fab fa-facebook fa-lg"></i>
                                        </a>
                                        <a href="#" class="text-decoration-none text-dark">
                                            <i class="fab fa-twitter fa-lg"></i>
                                        </a>
                                        <a href="#" class="text-decoration-none text-dark">
                                            <i class="fab fa-linkedin fa-lg"></i>
                                        </a>
                                        <a href="#" class="text-decoration-none text-dark">
                                            <i class="fab fa-youtube fa-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div class="container-fluid px-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.678901234567!2d-0.12345678901234567!3d51.12345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTHCsDA3JzI0LjQiTiAwwrAwNyczOC40Ilc!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                class="d-block">
        </iframe>
    </div>

</x-layout>