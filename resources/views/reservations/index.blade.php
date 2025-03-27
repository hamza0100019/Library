@extends('layouts.app')

@section('title', 'Mes Réservations')

@section('content')
<div class="container py-5 min-vh-100">
    <h1 class="fw-bold text-center mb-2" style="color: #264653;">📘 Mes Réservations</h1>
    <p class="text-center text-muted mb-5">Visualisez vos réservations, suivez leur état et téléchargez vos reçus.</p>

    @if($reservations->count())
        <div class="row g-4">
            @foreach($reservations as $reservation)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100 reservation-card">
                    @if($reservation->livre->image)
                    <img src="{{ asset('storage/' . $reservation->livre->image) }}" class="card-img-top" style="height: 220px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    @endif

                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title fw-bold text-dark">{{ $reservation->livre->titre }}</h5>
                            <p class="mb-1 text-muted"><i class="bi bi-person"></i> {{ $reservation->livre->auteur }}</p>
                            <p class="mb-1 text-muted"><i class="bi bi-calendar-event"></i> Du {{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }} au {{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }}</p>
                            
                            <!-- État -->
                            <div class="mb-3 mt-2">
                                @if($reservation->etat === 'validee')
                                    <span class="badge rounded-pill bg-success px-3 py-2">
                                        <i class="bi bi-check-circle-fill me-1"></i> Validée
                                    </span>
                                @elseif($reservation->etat === 'en_attente')
                                    <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
                                        <i class="bi bi-hourglass-split me-1"></i> En attente
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-danger px-3 py-2">
                                        <i class="bi bi-x-octagon-fill me-1"></i> Refusée
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between mt-auto gap-2">
                            <a href="{{ route('reservations.download', $reservation->id) }}" class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-download me-1"></i> Reçu
                            </a>

                            @if($reservation->etat === 'en_attente')
                            <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment annuler cette réservation ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                    <i class="bi bi-x-circle me-1"></i> Annuler
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center mt-5">
            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="Empty" style="width: 120px;" class="mb-3">
            <h5 class="text-muted">Aucune réservation trouvée pour l’instant.</h5>
        </div>
    @endif
</div>

<!-- Styles personnalisés -->
<style>
    .reservation-card {
        border-radius: 12px;
        background: #f8faff;
        transition: all 0.3s ease-in-out;
    }

    .reservation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.07);
    }

    .badge {
        font-size: 0.85rem;
    }

    .btn-outline-primary:hover {
        background-color: #2563eb;
        color: white;
        border-color: #2563eb;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
        border-color: #dc3545;
    }
</style>
@endsection

