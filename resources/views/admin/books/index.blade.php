@extends('layouts.app')

@section('title', 'Gestion des Livres')

@section('content')
<div class="container py-5 min-vh-100">
    <h1 class="fw-bold" style="color: #264653;">Gestion des Livres</h1>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary my-3">Ajouter un livre</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Quantité</th>
                <th>Catégorie</th>
                <th>Disponibilité</th>
                <th>Date de publication</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livres as $livre)
            <tr>
                <td>{{ $livre->id }}</td>
                <!-- Image -->
                <td>
                    @if($livre->image)
                        <img src="{{ asset('storage/' . $livre->image) }}" alt="{{ $livre->titre }}" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                    @else
                        <span class="text-muted">Pas d'image</span>
                    @endif
                </td>
                <td>{{ $livre->titre }}</td>
                <td>{{ $livre->auteur }}</td>
                <td>{{ $livre->quantite }}</td>
                <!-- Catégorie -->
                <td>
                    {{ $livre->categorie->nom ?? 'Non catégorisé' }}
                </td>
                <!-- Disponibilité -->
                <td>
                    <span class="badge {{ $livre->disponible ? 'bg-success' : 'bg-danger' }}">
                        {{ $livre->disponible ? 'Disponible' : 'Non disponible' }}
                    </span>
                </td>
                <td>{{ $livre->date_publication }}</td>
                <td>
                    <a href="{{ route('admin.books.edit', $livre->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('admin.books.destroy', $livre->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">Aucun livre trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
