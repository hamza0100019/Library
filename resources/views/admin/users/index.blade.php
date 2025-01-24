@extends('layouts.app')

@section('title', 'Gestion des Utilisateurs')

@section('content')
<div class="container py-5">
    <!-- Titre principal et bouton "Créer un utilisateur" -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold" style="color: #264653;">Gestion des Utilisateurs</h1>
            <p class="text-muted" style="font-size: 1.2rem;">Liste des utilisateurs et options de gestion.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-person-plus"></i> Créer un utilisateur
        </a>
    </div>

    <!-- Table des utilisateurs -->
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge {{ $user->role === 'admin' ? 'bg-primary' : 'bg-secondary' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Modifier
                        </a>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">
                                <i class="bi bi-trash"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun utilisateur trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
