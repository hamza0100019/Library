@extends('layouts.app')

@section('title', 'Page d\'accueil')

@section('content')
<section class="d-flex align-items-center min-vh-100" >
    <div class="container">
        <div class="row align-items-center">
            <!-- Texte à gauche -->
            <div class="col-lg-6 text-center text-lg-start pe-lg-5">
                <!-- <span class="badge text-primary mb-3 px-3 py-2 rounded-pill">Bienvenue sur Maktabaty</span> -->
                <h1 class="display-4 fw-bold mb-4 lh-sm">
                    Votre Bibliothèque <br>
                    <span style="color: #2563eb;">Numérique Intelligente</span>
                </h1>
                <p class="lead mb-4 text-secondary">
                    Plongez dans un monde de connaissances infinies. Découvrez notre collection soigneusement sélectionnée de livres numériques et imprimés.
                </p>
                <div class="d-flex flex-column flex-lg-row gap-3 justify-content-center justify-content-lg-start">
                    <a href="{{ route('books.searchView') }}" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center">
                        <i class="bi bi-book me-2"></i>
                        Explorer les livres
                    </a>
                    @guest
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-plus me-2"></i>
                        Créer un compte
                    </a>
                    @endguest
                </div>
                <div class="mt-5 d-flex gap-4 justify-content-center justify-content-lg-start">
                    <div class="text-center">
                        <h3 class="fw-bold text-primary mb-0">10K+</h3>
                        <p class="text-muted">Livres</p>
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold text-primary mb-0">5K+</h3>
                        <p class="text-muted">Utilisateurs</p>
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold text-primary mb-0">98%</h3>
                        <p class="text-muted">Satisfaction</p>
                    </div>
                </div>
            </div>

            <!-- Image à droite avec animation -->
            <div class="col-lg-6 d-none d-lg-block text-center position-relative">
                <div class="position-relative">
                    <!-- <img src="{{ asset('assets/book.svg') }}" alt="Hero Image" class="img-fluid" style="animation: float 6s ease-in-out infinite;"> -->
                    <div class="position-absolute top-0 end-0 bg-primary rounded-circle" style="width: 150px; height: 150px; filter: blur(50px); opacity: 0.2;"></div>
                    <div class="position-absolute bottom-0 start-0 bg-info rounded-circle" style="width: 120px; height: 120px; filter: blur(40px); opacity: 0.15;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
