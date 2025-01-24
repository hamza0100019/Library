@extends('layouts.app')

@section('title', 'Ajouter un Livre')

@section('content')
<div class="container py-5">
    <h1 class="text-center fw-bold" style="color: #264653;">Ajouter un Livre</h1>
    <p class="text-center text-muted">Remplissez les informations ci-dessous pour ajouter un nouveau livre à votre bibliothèque.</p>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <!-- Titre -->
                        <div class="mb-3">
                            <label for="titre" class="form-label fw-bold">Titre du Livre</label>
                            <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
                            @error('titre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Auteur -->
                        <div class="mb-3">
                            <label for="auteur" class="form-label fw-bold">Auteur</label>
                            <input type="text" name="auteur" id="auteur" class="form-control @error('auteur') is-invalid @enderror" value="{{ old('auteur') }}" required>
                            @error('auteur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Quantité -->
                        <div class="mb-3">
                            <label for="quantite" class="form-label fw-bold">Quantité</label>
                            <input type="number" name="quantite" id="quantite" class="form-control @error('quantite') is-invalid @enderror" value="{{ old('quantite') }}" required>
                            @error('quantite')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date de publication -->
                        <div class="mb-3">
                            <label for="date_publication" class="form-label fw-bold">Date de Publication</label>
                            <input type="date" name="date_publication" id="date_publication" class="form-control @error('date_publication') is-invalid @enderror" value="{{ old('date_publication') }}" required>
                            @error('date_publication')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Catégorie -->
                        <div class="mb-3">
                            <label for="categorie_id" class="form-label fw-bold">Catégorie</label>
                            <select name="categorie_id" id="categorie_id" class="form-select @error('categorie_id') is-invalid @enderror">
                                <option value="">Sélectionner une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categorie_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Disponibilité -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Disponibilité</label>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="disponible" id="disponible" class="form-check-input" value="1" {{ old('disponible', true) ? 'checked' : '' }}>
                                <label for="disponible" class="form-check-label">Disponible</label>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Image du Livre</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Boutons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.books') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Ajouter le Livre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
