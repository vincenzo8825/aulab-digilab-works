<footer class="site-footer bg-dark text-white py-4 mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <h5 class="site-footer__title">VerbaHub</h5>
                <p class="site-footer__description">Il crocevia delle parole dove nascono le storie</p>
                <div class="site-footer__social mt-3">
                    <a href="#" class="site-footer__social-link"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="site-footer__social-link"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="site-footer__social-link"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="site-footer__social-link"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="site-footer__social-link"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="site-footer__social-link"><i class="bi bi-github"></i></a> 
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <h5 class="site-footer__title">Link utili</h5>
                <ul class="site-footer__links list-unstyled d-flex d-md-block flex-wrap justify-content-center">
                    <li class="me-3 me-md-0"><a href="{{ route('homepage') }}" class="site-footer__link text-white">Home</a></li>
                    <li class="me-3 me-md-0"><a href="{{ route('article.index') }}" class="site-footer__link text-white">Articoli</a></li>
                    <li class="me-3 me-md-0"><a href="{{ route('about') }}" class="site-footer__link text-white">Chi Siamo</a></li>
                    @auth
                        <li class="me-md-0"><a href="{{ route('careers') }}" class="site-footer__link text-white">Lavora con noi</a></li>
                    @endauth
                </ul>
            </div>
            <div class="col-12 col-md-4">
                <h5 class="site-footer__title">Contatti</h5>
                <p class="site-footer__contact">Email: info@verbahub.it</p>
                <p class="site-footer__contact">Tel: +39 123 456 7890</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="site-footer__copyright mb-0">&copy; {{ date('Y') }} VerbaHub. Tutti i diritti riservati.</p>
            </div>
        </div>
    </div>
</footer>
