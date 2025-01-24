@extends('layouts.app')

@section('content')
<section class="email-reset-section min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center bg-primary-color py-3">
                        <h3 class="fw-bold mb-0">
                            <i class="bi bi-envelope-fill"></i> Réinitialisation du mot de passe
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Adresse Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">{{ __('Adresse Email') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary-color">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Votre adresse email">
                                </div>
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Bouton d'envoi -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-action-secondary py-2 fw-bold">
                                    {{ __('Envoyer le lien de réinitialisation') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <p class="mb-0">Retour à la <a href="{{ route('login') }}" class="text-accent-color fw-bold">page de connexion</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
