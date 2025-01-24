<footer class="bg-primary-color text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Section À propos -->
            <div class="col-md-4 text-center text-md-start mb-4 mb-md-0">
                <h5 class="fw-bold text-accent-color">Maktabaty</h5>
                <p class="">
                    Maktabaty est une plateforme dédiée à l'apprentissage. Explorez des milliers de ressources pour enrichir vos connaissances.
                </p>
            </div>

            <!-- Liens utiles -->
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <h5 class="fw-bold text-accent-color">Liens rapides</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('books.searchView') }}" class="footer-link">Livres</a></li>
                    <li><a href="{{ route('reservations.index') }}" class="footer-link">Réservations</a></li>
                    <li><a href="#contact" class="footer-link">Contactez-nous</a></li>
                </ul>
            </div>

            <!-- Réseaux sociaux -->
            <div class="col-md-4 text-center text-md-end">
                <h5 class="fw-bold text-accent-color">Suivez-nous</h5>
                <div class="d-flex justify-content-center justify-content-md-end gap-3">
                    <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>

        <hr class="my-4 text-muted">
        <p class="text-muted small mb-0 text-center">
            © 2025 Maktabaty. Tous droits réservés. <a href="https://aznidi.vercel.app" target="_blank">(AZNIDI SALAH)</a>
        </p>
    </div>
</footer>
