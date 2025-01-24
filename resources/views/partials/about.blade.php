@extends('layouts.app')

@section('title', 'À propos')

@section('content')
<section class="about-section bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image à gauche -->
            <div class="col-lg-6 text-center mb-4 mb-lg-0">
                <img src="{{ asset('assets/about.svg') }}" alt="About Image" class="img-fluid about-image">
            </div>

            <!-- Contenu à droite -->
            <div class="col-lg-6 text-center text-lg-start">
                <h2 class="display-4 fw-bold mb-4 text-primary">À propos de Maktabaty</h2>
                <p class="lead text-secondary mb-4">
                    Maktabaty est une plateforme qui simplifie l'accès à des milliers de ressources éducatives en ligne, pour que chacun puisse apprendre, lire et évoluer à son propre rythme.
                </p>
                <a href="{{ route('books.searchView') }}" class="btn btn- btn-lg me-3">Explorer les Livres</a>
            </div>
        </div>
    </div>
</section>
@endsection
