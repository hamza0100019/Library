@extends('layouts.app')

@section('title', 'Page d\'accueil')

@section('content')
<section class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row align-items-center">
            <!-- Texte à gauche -->
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 fw-bold mb-4">
                    Découvrez, Lisez, <br>
                    <span style="color: #E76F51;">Évoluez avec Maktabaty</span>
                </h1>
                <p class="lead mb-4">
                    Accédez à des milliers de livres et ressources en ligne. Votre partenaire pour une lecture sans limites.
                </p>
                <div class="d-flex flex-column flex-lg-row gap-3 justify-content-center justify-content-lg-start">
                    <a href="{{ route('books.searchView') }}" class="btn btn-action-secondary d-flex align-items-center">
                        Explorer les livres
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Image à droite -->
            <div class="col-lg-6 d-none d-lg-block text-center">
                <img src="{{ asset('assets/hero.svg') }}" alt="Hero Image">
            </div>
        </div>
    </div>
</section>
@include('partials.whyus')
@include('partials.blog')
@include('partials.contact')
@endsection
