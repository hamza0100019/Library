@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Profil utilisateur -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <!-- Photo de profil -->
                    @if ($user->profile)
                        <img src="{{ asset('storage/' . $user->profile) }}" alt="Photo de Profil" class="img-thumbnail rounded-circle mb-3" style="width: 150px; height: 150px;">
                    @else
                        <img src="{{ asset('assets/default-profile.png') }}" alt="Photo de Profil" class="img-thumbnail rounded-circle mb-3" style="width: 150px; height: 150px;">
                    @endif

                    <!-- Nom et email -->
                    <h5 class="fw-bold text-primary">{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->email }}</p>

                    <!-- Liens d'actions -->
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">Modifier le Profil</a>
                </div>
            </div>
        </div>

        <!-- Informations supplémentaires -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Dernières Réservations</h5>
                </div>
                <div class="card-body">
                    @if($user->reservations->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Livre</th>
                                        <th>Date de Début</th>
                                        <th>Date de Fin</th>
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
                                                <span class="badge
                                                    {{ $reservation->etat === 'validée' ? 'bg-success' : ($reservation->etat === 'en_attente' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                                    {{ ucfirst($reservation->etat) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('reservations.index') }}" class="btn btn-primary btn-sm">Voir toutes les réservations</a>
                    @else
                        <p class="text-muted">Aucune réservation trouvée.</p>
                    @endif
                </div>
            </div>

            <!-- Autres paramètres -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Paramètres</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Vous pouvez mettre à jour vos informations personnelles et gérer votre compte ici.</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary btn-sm">Modifier les Paramètres</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
