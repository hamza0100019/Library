@extends('layouts.app')

@section('content')
<section class="register-section min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center bg-primary-color py-3">
                        <h3 class="fw-bold mb-0">
                            <i class="bi bi-person-plus-fill"></i> Inscription
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nom -->
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold">{{ __('Nom complet') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary-color">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Votre nom complet">
                                </div>
                                @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">{{ __('Adresse Email') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary-color">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Votre adresse email">
                                </div>
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Mot de passe -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">{{ __('Mot de passe') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary-color">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Votre mot de passe">
                                </div>
                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Confirmation mot de passe -->
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label fw-semibold">{{ __('Confirmer le mot de passe') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary-color">
                                        <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez votre mot de passe">
                                </div>
                            </div>

                            <!-- Bouton d'inscription -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-action-secondary py-2 fw-bold">
                                    {{ __('S\'inscrire') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <p class="mb-0">Déjà inscrit ? <a href="{{ route('login') }}" class="text-accent-color fw-bold">Se connecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
