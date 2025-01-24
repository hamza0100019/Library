@extends('layouts.app')

@section('title', 'Réserver un Livre')

@section('content')
<div class="container py-5 min-vh-100">
    <!-- Titre principal -->
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #264653; font-size: 2.5rem;">Réserver un Livre</h1>
        <p class="text-muted" style="font-size: 1.2rem;">Confirmez votre réservation pour <strong>{{ $livre->titre }}</strong> écrit par <strong>{{ $livre->auteur }}</strong>.</p>
    </div>
    @if(session('exist'))
        <div class="text-center mb-5">
            <p class="text-danger" style="font-size: 1.2rem;">{{ session('exist') }}</p>
        </div>
    @endif


    <!-- Détails du Livre -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                @if($livre->image)
                <img src="{{ asset('storage/' . $livre->image) }}" alt="{{ $livre->titre }}" class="card-img-top" style="height: 300px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                @endif
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color: #264653; font-size: 1.5rem;">{{ $livre->titre }}</h5>
                    <p class="text-muted mb-3" style="font-size: 1rem;">
                        <i class="bi bi-person" style="color: #E76F51;"></i> Auteur : {{ $livre->auteur }}
                    </p>
                    <p class="text-muted mb-3" style="font-size: 1rem;">
                        <i class="bi bi-book" style="color: #E76F51;"></i> Description : {{ $livre->description }}
                    </p>
                    <p class="text-muted mb-3" style="font-size: 1rem;">
                        <i class="bi bi-clock" style="color: #E76F51;"></i> Date de Publication : {{ \Carbon\Carbon::parse($livre->date_publication)->locale('fr')->isoFormat('D MMMM YYYY') }}
                    </p>
                    <p class="text-muted mb-3" style="font-size: 1rem;">
                        <i class="bi bi-check-circle" style="color: #E76F51;"></i> Disponibilité :
                        <span class="fw-bold" style="color: {{ $livre->disponible ? '#28a745' : '#dc3545' }};">
                            {{ $livre->disponible ? 'Disponible' : 'Non Disponible' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton de Réservation -->
    <div class="text-center mt-4">
        @if($livre->disponible)
        <form action="{{ route('tobook.create', $livre->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg" style="background-color: #E76F51; border-color: #E76F51;">
                <i class="bi bi-bookmark-check"></i> Confirmer la Réservation
            </button>
        </form>
        @else
        <div class="alert alert-danger mt-3">
            Ce livre n'est pas disponible pour le moment.
        </div>
        @endif
    </div>
</div>
@endsection
