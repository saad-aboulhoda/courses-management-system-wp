<footer class="text-center">
    <!-- Grid container -->
    <div class="container pt-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Linkedin -->
            <a
                    data-mdb-ripple-init
                    class="btn btn-link btn-floating btn-lg text-body m-1"
                    href="https://www.linkedin.com/in/saad-aboulhoda/"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-linkedin"></i
                ></a>
            <!-- Github -->
            <a
                    data-mdb-ripple-init
                    class="btn btn-link btn-floating btn-lg text-body m-1"
                    href="https://github.com/saad-aboulhoda"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-github"></i
                ></a>
                            <!-- Github -->
            <a
                    data-mdb-ripple-init
                    class="btn btn-link btn-floating btn-lg text-body m-1"
                    href="https://aboulhoda.me"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fa-solid fa-globe"></i
                ></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 copyright">
        © 2024 - {{ date('Y') }} Copyright - Version: 0.2
    </div>
    <!-- Copyright -->
    {{ wp_footer()  }}

    <!-- Script -->
    <script src="{{ asset('dist/js/script.js')  }}"></script>
</footer>