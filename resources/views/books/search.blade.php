@extends('layouts.app')

@section('title', 'Rechercher un Livre')

@section('content')
<div class="container py-5 min-vh-100">
    <!-- Titre principal -->
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #264653; font-size: 2.5rem;">Rechercher un Livre</h1>
        <p class="text-muted" style="font-size: 1.2rem;">Trouvez le livre que vous recherchez en saisissant un titre, un auteur ou une description, et appliquez des filtres pour affiner votre recherche.</p>
    </div>

    <!-- Formulaire de recherche -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="{{ route('books.search') }}" method="GET">
                <!-- Barre de recherche -->
                <div class="input-group mb-4 shadow-sm">
                    <input
                        type="text"
                        name="query"
                        class="form-control form-control-lg"
                        placeholder="Rechercher un livre..."
                        value="{{ request('query') }}"
                        style="border-color: #264653; font-size: 1.1rem;">
                    <button type="submit" class="btn btn-primary btn-lg" style="background-color: #E76F51; border-color: #E76F51;">
                        <i class="bi bi-search"></i> Rechercher
                    </button>
                </div>

                <!-- Filtres -->
                <div class="row">
                    <!-- Filtrer par catégorie -->
                    <div class="col-md-4 mb-3">
                        <select name="categorie" class="form-select">
                            <option value="">Toutes les catégories</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtrer par année -->
                    <div class="col-md-4 mb-3">
                        <select name="annee" class="form-select">
                            <option value="">Toutes les années</option>
                            @foreach(range(date('Y'), 1900) as $annee)
                                <option value="{{ $annee }}" {{ request('annee') == $annee ? 'selected' : '' }}>
                                    {{ $annee }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtrer par disponibilité -->
                    <div class="col-md-4 mb-3">
                        <select name="disponibilite" class="form-select">
                            <option value="">Tous les états</option>
                            <option value="1" {{ request('disponibilite') == '1' ? 'selected' : '' }}>Disponible</option>
                            <option value="0" {{ request('disponibilite') == '0' ? 'selected' : '' }}>Non disponible</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary w-100 mt-3">Appliquer les Filtres</button>
            </form>
        </div>
    </div>

    <!-- Résultats de la recherche -->
    @if(isset($livres) && $livres->isNotEmpty())
    <div class="row mt-4">
        @foreach($livres as $livre)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm h-100 border-0" style="border-radius: 15px;">
                <!-- Image -->
                @if($livre->image)
                <img src="{{ asset('storage/' . $livre->image) }}" alt="{{ $livre->titre }}" class="card-img-top" style="height: 200px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                @endif
                <div class="card-body d-flex flex-column justify-content-between">
                    <!-- Titre -->
                    <div>
                        <h5 class="card-title fw-bold mb-3" style="color: #264653; font-size: 1.5rem;">
                            {{ $livre->titre }}
                        </h5>
                        <!-- Auteur -->
                        <p class="text-muted mb-2" style="font-size: 1rem;">
                            <i class="bi bi-person" style="color: #E76F51;"></i> {{ $livre->auteur }}
                        </p>
                        <!-- Catégorie -->
                        <p class="text-muted mb-2" style="font-size: 1rem;">
                            <i class="bi bi-folder" style="color: #E76F51;"></i> {{ $livre->categorie->nom ?? 'Non catégorisé' }}
                        </p>
                        <!-- Disponibilité -->
                        <p class="text-muted mb-3" style="font-size: 1rem;">
                            <i class="bi {{ $livre->disponible ? 'bi-check-circle' : 'bi-x-circle' }}" style="color: {{ $livre->disponible ? '#28a745' : '#dc3545' }};"></i>
                            {{ $livre->disponible ? 'Disponible' : 'Non disponible' }}
                        </p>
                        <!-- Description -->
                        <p class="card-text mb-3" style="font-size: 0.95rem; color: #555;">
                            {{ \Illuminate\Support\Str::limit($livre->description, 120) }}
                        </p>
                    </div>
                    <!-- Bouton -->
                    <div>

                        @if ($livre->disponible)
                            <a href="{{route('tobook.index', $livre->id)}}" class="btn w-100" style="background-color: #E76F51; border-color: #E76F51; color: white; font-weight: bold; font-size: 1rem; border-radius: 10px;">
                                Réserver
                            </a>
                        @endif

                        @if (!$livre->disponible)
                            <a href="#" class="btn w-100" style="background-color: #E76F51; border-color: #E76F51; color: white; font-weight: bold; font-size: 1rem; border-radius: 10px;">
                                Voir Détails
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $livres->links() }}
    </div>
    @else
        @if(isset($livres))
        <div class="text-center mt-5">
            <h5 class="text-muted" style="font-size: 1.1rem;">Aucun livre trouvé pour votre recherche.</h5>
        </div>
        @endif
    @endif
</div>
@endsection
