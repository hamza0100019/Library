<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Routes Web
|--------------------------------------------------------------------------
|
| Ce fichier définit les routes web de l'application. Toutes les routes
| définies ici sont automatiquement associées au groupe de middleware "web",
| qui inclut la gestion des sessions, la protection CSRF, et d'autres
| fonctionnalités essentielles des applications Laravel.
|
*/

/* Route par défaut pour la page d'accueil.
   Cette route retourne la vue 'home'. */
Route::get('/', function () {
    return view('home');
});

/* Routes de type resource pour la gestion des livres (livres).
   Ces routes permettent des opérations CRUD standard (index, create, store, show, edit, update, destroy). */
Route::prefix('books')->group(function() {
    Route::get('/search', [LivreController::class, 'searchView'])->name('books.searchView');
    Route::get('/request', [LivreController::class, 'search'])->name('books.search');
});

/* Routes pour le profil utilisateur */
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


/* Groupe de routes réservé aux administrateurs.
   Les middlewares 'auth' et 'admin' assurent que seules les personnes authentifiées en tant qu'administrateurs
   peuvent accéder à ces routes. */
Route::middleware(['auth', 'admin'])->group(function () {
    /* Route vers le tableau de bord de l'administrateur. */
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    /* Route pour la gestion des utilisateurs par l'administrateur. */
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');

    // CRUD pour les utilisateurs
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create'); // Formulaire de création
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store'); // Sauvegarder un nouvel utilisateur
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit'); // Formulaire d'édition
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update'); // Mettre à jour un utilisateur
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete'); // Supprimer un utilisateur

    /* Route pour la gestion des livres par l'administrateur. */
    Route::get('/admin/books', [LivreController::class, 'index'])->name('admin.books');
    Route::get('/admin/books/create', [LivreController::class, 'create'])->name('admin.books.create');
    Route::post('/admin/books', [LivreController::class, 'store'])->name('admin.books.store');
    Route::get('/admin/books/{id}/edit', [LivreController::class, 'edit'])->name('admin.books.edit');
    Route::put('/admin/books/{id}', [LivreController::class, 'update'])->name('admin.books.update');
    Route::delete('/admin/books/{id}', [LivreController::class, 'destroy'])->name('admin.books.destroy');

    /* Route pour la gestion des réservations par l'administrateur. */
    Route::get('/admin/reservations', [AdminController::class, 'manageReservations'])->name('admin.reservations');

    /* Route pour accéder aux rapports générés par l'administrateur. */
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
});


Route::middleware('auth')->group(function () {
    Route::get('/to-book/{id}', [ReservationController::class, 'tobookview'])->name('tobook.index');
    Route::post('/to-book/{id}', [ReservationController::class, 'create'])->name('tobook.create');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/download/{id}', [ReservationController::class, 'download'])->name('reservations.download');
    Route::delete('/reservations/{id}', [ReservationController::class, 'cancel'])->name('reservations.cancel');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/reservations', [ReservationController::class, 'adminIndex'])->name('admin.reservations');
    Route::post('/admin/reservations/{id}/{etat}', [ReservationController::class, 'updateStatus'])->name('admin.reservations.updateStatus');
    Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');
});



/* Routes d'authentification fournies par Laravel.
   Comprend des fonctionnalités comme l'inscription, la connexion et la réinitialisation du mot de passe. */
Auth::routes();

/* Route pour la page d'accueil des utilisateurs connectés.
   Utilise HomeController pour afficher la vue appropriée. */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
