@extends('layouts.app')

@section('content')
<section class="login-section min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center bg-primary-color py-3">
                        <h3 class="fw-bold mb-0">
                            <i class="bi bi-box-arrow-in-right"></i> Connexion
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

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

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">{{ __('Mot de passe') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-primary-color">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Votre mot de passe">
                                </div>
                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-4 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Se souvenir de moi') }}
                                </label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-action-secondary py-2 fw-bold">
                                    {{ __('Se connecter') }}
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                            <div class="text-center mt-3">
                                <a class="text-primary-color text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié ?') }}
                                </a>
                            </div>
                            @endif
                        </form>
                    </div>
                    <div class="card-footer text-center bg-light">
                        <p class="mb-0">Pas encore inscrit ? <a href="{{ route('register') }}" class="text-accent-color fw-bold">Créer un compte</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
