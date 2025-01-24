@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">
    <!-- Titre principal -->
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #264653;">Bienvenue dans le Dashboard Admin</h1>
        <p class="text-muted" style="font-size: 1.2rem;">Gérez les utilisateurs, les réservations et les livres depuis cet espace centralisé.</p>
    </div>

    <!-- Section des statistiques -->
    <div class="row mb-5 g-4">
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm border-0" style="background-color: #E76F51; color: #F5F5F5;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Utilisateurs</h5>
                    <p class="display-4 fw-bold">{{ \App\Models\User::count() }}</p>
                    <a href="#" class="btn btn-light fw-bold" style="color: #264653;">Gérer les utilisateurs</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm border-0" style="background-color: #264653; color: #F5F5F5;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Livres</h5>
                    <p class="display-4 fw-bold">320</p>
                    <a href="#" class="btn btn-light fw-bold" style="color: #E76F51;">Gérer les livres</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm border-0" style="background-color: #F4A261; color: #264653;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Réservations</h5>
                    <p class="display-4 fw-bold">75</p>
                    <a href="#" class="btn btn-light fw-bold" style="color: #264653;">Gérer les réservations</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Liens utiles -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center mb-4" style="color: #264653;">Liens Utiles</h3>
            <ul class="list-group">
                <li class="list-group-item" style="background-color: #F5F5F5;">
                    <a href="#" class="text-decoration-none" style="color: #264653;">
                        <i class="bi bi-person me-2"></i> Gestion des utilisateurs
                    </a>
                </li>
                <li class="list-group-item" style="background-color: #F5F5F5;">
                    <a href="#" class="text-decoration-none" style="color: #E76F51;">
                        <i class="bi bi-book me-2"></i> Gestion des livres
                    </a>
                </li>
                <li class="list-group-item" style="background-color: #F5F5F5;">
                    <a href="#" class="text-decoration-none" style="color: #264653;">
                        <i class="bi bi-calendar me-2"></i> Gestion des réservations
                    </a>
                </li>
                <li class="list-group-item" style="background-color: #F5F5F5;">
                    <a href="#" class="text-decoration-none" style="color: #E76F51;">
                        <i class="bi bi-bar-chart me-2"></i> Rapports et Statistiques
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
