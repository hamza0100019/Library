@extends('layouts.app')

@section('title', 'Admin/ Réservations')

@section('content')
<div class="container py-5 min-vh-100">
    <h1 class="fw-bold text-center" style="color: #264653;">Gestion des Réservations</h1>
    <p class="text-center text-muted mb-5">Validez, modifiez ou supprimez les réservations des utilisateurs.</p>

    <!-- Tableau des réservations -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Livre</th>
                    <th>Utilisateur</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $reservation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reservation->livre->titre }}</td>
                    <td>{{ $reservation->user->name }} ({{ $reservation->user->email }})</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->date_debut)->locale('fr')->isoFormat('LL') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->date_fin)->locale('fr')->isoFormat('LL') }}</td>
                    <td>
                        <form action="{{ route('admin.reservations.updateStatus', ['id' => $reservation->id, 'etat' => 'validee']) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('POST')
                            <select name="etat" onchange="this.form.submit()" class="form-select form-select-sm">
                                <option value="en_attente" {{ $reservation->etat === 'en_attente' ? 'selected' : '' }}>En Attente</option>
                                <option value="validee" {{ $reservation->etat === 'validee' ? 'selected' : '' }}>Validée</option>
                                <option value="annulee" {{ $reservation->etat === 'annulee' ? 'selected' : '' }}>Annulée</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette réservation ?');" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Aucune réservation trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
