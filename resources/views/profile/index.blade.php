@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <!-- Profil utilisateur -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4 profile-card">
                <!-- Photo de profil -->
                @if ($user->profile)
                    <img src="{{ asset('storage/' . $user->profile) }}" alt="Photo de Profil" class="rounded-circle img-thumbnail mb-3 profile-img">
                @else
                    <img src="{{ asset('assets/default-profile.png') }}" alt="Photo de Profil" class="rounded-circle img-thumbnail mb-3 profile-img">
                @endif

                <!-- Nom et email -->
                <h5 class="fw-bold text-primary mb-0">{{ $user->name }}</h5>
                <small class="text-muted mb-3 d-block">{{ $user->email }}</small>

                <!-- Action -->
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm px-4">
                    <i class="bi bi-pencil-square me-1"></i> Modifier le Profil
                </a>
            </div>
        </div>

        <!-- Réservations & Paramètres -->
        <div class="col-md-8">
            <!-- Dernières Réservations -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-journal-bookmark me-2"></i>Dernières Réservations</h5>
                    @if($user->reservations->count() > 0)
                        <a href="{{ route('reservations.index') }}" class="btn btn-light btn-sm">
                            Voir tout
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    @if($user->reservations->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Livre</th>
                                        <th>Début</th>
                                        <th>Fin</th>
                                        <th>État</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->reservations->take(5) as $reservation)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $reservation->livre->titre }}</td>
                                            <td>{{ \Carbon\Carbon::parse($reservation->date_debut)->locale('fr')->isoFormat('LL') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($reservation->date_fin)->locale('fr')->isoFormat('LL') }}</td>
                                            <td>
                                                <span class="badge rounded-pill 
                                                    {{ $reservation->etat === 'validée' ? 'bg-success' : ($reservation->etat === 'en_attente' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                                    {{ ucfirst($reservation->etat) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0">Aucune réservation trouvée.</p>
                    @endif
                </div>
            </div>

            <!-- Paramètres -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="bi bi-gear me-2"></i>Paramètres du compte</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Mettez à jour vos informations personnelles, votre email ou votre mot de passe.</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-person-gear me-1"></i> Modifier les Paramètres
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles personnalisés -->
<style>
    .profile-card {
        background: linear-gradient(135deg, #f8faff, #ffffff);
        border-radius: 15px;
    }

    .profile-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .profile-img:hover {
        transform: scale(1.05);
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.45em 0.8em;
    }

    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endsection
