@extends('layouts.app')

@section('title', 'Modifier Mon Profil')

@section('content')
<div class="container py-5">
    <h1 class="text-center fw-bold" style="color: #264653;">Modifier Mon Profil</h1>
    <p class="text-center text-muted">Mettez à jour vos informations personnelles.</p>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nom</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image de Profil -->
                        <div class="mb-3">
                            <label for="profile" class="form-label fw-bold">Photo de Profil</label>
                            <input type="file" name="profile" id="profile" class="form-control @error('profile') is-invalid @enderror">
                            @error('profile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- Image actuelle -->
                            @if ($user->profile)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $user->profile) }}" alt="Photo de Profil" class="img-thumbnail" style="width: 150px; height: 150px;">
                                </div>
                            @endif
                        </div>

                        <!-- Boutons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('profile') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
