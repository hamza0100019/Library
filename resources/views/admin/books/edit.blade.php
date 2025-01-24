@extends('layouts.app')

@section('title', 'Modifier le Livre')

@section('content')
<div class="container py-5">
    <h1 class="text-center fw-bold" style="color: #264653;">Modifier le Livre</h1>
    <p class="text-center text-muted">Mettez à jour les informations du livre sélectionné.</p>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form action="{{ route('admin.books.update', $livre->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Titre -->
                        <div class="mb-3">
                            <label for="titre" class="form-label fw-bold">Titre du Livre</label>
                            <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre', $livre->titre) }}" required>
                            @error('titre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Auteur -->
                        <div class="mb-3">
                            <label for="auteur" class="form-label fw-bold">Auteur</label>
                            <input type="text" name="auteur" id="auteur" class="form-control @error('auteur') is-invalid @enderror" value="{{ old('auteur', $livre->auteur) }}" required>
                            @error('auteur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $livre->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Quantité -->
                        <div class="mb-3">
                            <label for="quantite" class="form-label fw-bold">Quantité</label>
                            <input type="number" name="quantite" id="quantite" class="form-control @error('quantite') is-invalid @enderror" value="{{ old('quantite', $livre->quantite) }}" required>
                            @error('quantite')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date de publication -->
                        <div class="mb-3">
                            <label for="date_publication" class="form-label fw-bold">Date de Publication</label>
                            <input type="date" name="date_publication" id="date_publication" class="form-control @error('date_publication') is-invalid @enderror" value="{{ old('date_publication', $livre->date_publication) }}" required>
                            @error('date_publication')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Boutons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.books') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
