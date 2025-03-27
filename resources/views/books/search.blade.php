@extends('layouts.app')

@section('title', 'Rechercher un Livre')

@section('content')

@php
    if (!isset($livres)) {
        $livres = \App\Models\Livre::orderBy('created_at', 'desc')->take(9)->get();
    }
@endphp

<div class="container py-5 min-vh-100">
    <!-- Titre -->
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5" style="color: #264653;">📚 Explorer la Bibliothèque</h1>
        <p class="text-muted fs-5">Recherchez un livre ou découvrez nos dernières sélections</p>
    </div>

    <!-- Barre de recherche -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <form action="{{ route('books.search') }}" method="GET" class="input-group shadow-lg">
                <input
                    type="text"
                    name="query"
                    class="form-control form-control-lg rounded-start"
                    placeholder="Titre, auteur, description..."
                    value="{{ request('query') }}"
                    style="font-size: 1.1rem; border: 2px solid #264653;">
                <button type="submit" class="btn btn-lg rounded-end" style="background-color: #2563EB; color: white;">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Affichage des livres -->
    @if($livres->isNotEmpty())
    <h3 class="mb-4 fw-semibold" style="color: #264653;">
        {{ request('query') ? '🔍 Résultats de votre recherche' : '✨ Livres récents dans la bibliothèque' }}
    </h3>
    @if(session('success'))
    <div class="alert alert-success text-center mt-3">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger text-center mt-3">
        {{ session('error') }}
    </div>
@endif

@if(session('exist'))
    <div class="alert alert-warning text-center mt-3">
        {{ session('exist') }}
    </div>
@endif

    <div class="row g-4">
        @foreach($livres as $livre)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm book-card position-relative overflow-hidden">
                <!-- Image -->
                @if($livre->image)
                <img src="{{ asset('storage/' . $livre->image) }}" alt="{{ $livre->titre }}"
                     class="card-img-top book-img">
                @endif

                <!-- Badge Disponibilité -->
                <span class="position-absolute top-0 end-0 m-2 badge 
                    {{ $livre->disponible ? 'bg-success' : 'bg-danger' }}">
                    {{ $livre->disponible ? 'Disponible' : 'Indisponible' }}
                </span>

                <!-- Contenu -->
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title fw-bold text-dark">{{ $livre->titre }}</h5>
                        <p class="mb-1 text-muted"><i class="bi bi-person me-1 text-primary-blue"></i> {{ $livre->auteur }}</p>
                        <p class="mb-2 text-muted"><i class="bi bi-folder me-1 text-primary-blue"></i> {{ $livre->categorie->nom ?? 'Non catégorisé' }}</p>
                        <p class="card-text small" style="color: #555;">
                            {{ \Illuminate\Support\Str::limit($livre->description, 100) }}
                        </p>
                    </div>
                    <div class="mt-3">
                        @if($livre->disponible)
                            <form action="{{ route('tobook.create', $livre->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn w-100 btn-custom" style="background-color: #2563EB; color: white;">📖 Réserver</button>
                            </form>
                        @else
                            <a href="{{ route('tobook.index', $livre->id) }}" class="btn w-100 btn-custom" style="background-color: #2563EB; color: white;">👀 Voir Détails</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if(method_exists($livres, 'links'))
    <div class="mt-5">
        {{ $livres->links() }}
    </div>
    @endif

    @else
    <div class="text-center mt-5">
        <h5 class="text-muted">Aucun livre trouvé pour cette recherche.</h5>
    </div>
    @endif
</div>

<!-- Styles bleus -->
<style>
    .book-card {
        border-radius: 20px;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #ffffff, #f9f9f9);
    }

    .book-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 32px rgba(0,0,0,0.08);
    }

    .book-img {
        height: 230px;
        object-fit: cover;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .action-btn {
        background-color: #2563EB;
        color: white;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        background-color: #1e4ed8;
        box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
    }

    .text-primary-blue {
        color: #2563EB;
    }

    .badge {
        font-size: 0.8rem;
        padding: 0.5em 0.75em;
        border-radius: 10px;
    }
</style>
@endsection
