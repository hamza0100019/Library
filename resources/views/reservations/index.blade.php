@extends('layouts.app')

@section('title', 'Mes Réservations')

@section('content')
<div class="container py-5 min-vh-100">
    <h1 class="fw-bold text-center" style="color: #264653;">Mes Réservations</h1>
    <p class="text-center text-muted mb-5">Gérez vos réservations, vérifiez leur état et téléchargez les reçus.</p>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Livre</th>
                    <th>Auteur</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $reservation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($reservation->livre->image)
                            <img src="{{ asset('storage/' . $reservation->livre->image) }}" alt="{{ $reservation->livre->titre }}" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                            <span class="text-muted">Pas d'image</span>
                        @endif
                    </td>
                    <td>{{ $reservation->livre->titre }}</td>
                    <td>{{ $reservation->livre->auteur }}</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->date_debut)->locale('fr')->isoFormat('LL') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->date_fin)->locale('fr')->isoFormat('LL') }}</td>
                    <td>
                        <span class="badge {{ $reservation->etat === 'validée' ? 'bg-success' : ($reservation->etat === 'en_attente' ? 'bg-warning text-dark' : 'bg-danger') }}">
                            {{ ucfirst($reservation->etat) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('reservations.download', $reservation->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-download"></i> Reçu
                            </a>
                            @if($reservation->etat === 'en_attente')
                            <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment annuler cette réservation ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-x-circle"></i> Annuler
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Aucune réservation trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
