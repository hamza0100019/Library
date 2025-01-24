@extends('layouts.app')

@section('content')
<section class="reset-password-section min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center bg-primary-color py-3">
                        <h3 class="fw-bold mb-0">
                            <i class="bi bi-shield-lock-fill"></i> Réinitialisation du mot de passe
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <!-- Adresse email -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">{{ __('Adresse Email') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary-color">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Votre adresse email">
                                </div>
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Nouveau mot de passe -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">{{ __('Nouveau mot de passe') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary-color">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Votre nouveau mot de passe">
                                </div>
                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Confirmer le mot de passe -->
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label fw-semibold">{{ __('Confirmer le mot de passe') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary-color">
                                        <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez votre mot de passe">
                                </div>
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-action-secondary py-2 fw-bold">
                                    {{ __('Réinitialiser le mot de passe') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <p class="mb-0">Vous vous souvenez de votre mot de passe ? <a href="{{ route('login') }}" class="text-accent-color fw-bold">Se connecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
