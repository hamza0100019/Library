<nav class="navbar navbar-expand-lg navbar-light bg-blur fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary-color" href="{{ url('/') }}">
            Maktabaty (AZNIDI SALAH 202)
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center space-x-4">
                <!-- Liens utilisateurs -->
                <li class="nav-item">
                    <a class="nav-link link-hover text-primary-color fw-semibold" href="{{ route('books.searchView') }}">
                        Livres
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-hover text-primary-color fw-semibold" href="{{ route('reservations.index') }}">
                        Réservations
                    </a>
                </li>

                <!-- Vérification de l'authentification -->
                @auth
                    <!-- Menu pour les administrateurs -->
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle link-hover text-primary-color fw-semibold" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-tools"></i> Administration
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-speedometer2"></i> Tableau de bord
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.users') }}">
                                        <i class="bi bi-people"></i> Gestion des utilisateurs
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.books') }}">
                                        <i class="bi bi-book"></i> Gestion des livres
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.reservations') }}">
                                        <i class="bi bi-calendar-event"></i> Gestion des réservations
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.reports') }}">
                                        <i class="bi bi-bar-chart-line"></i> Rapports et statistiques
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <!-- Menu utilisateur -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle link-hover text-primary-color fw-semibold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> Profil
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="bi bi-person"></i> Mon Profil
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Menu pour les invités -->
                    <li class="nav-item">
                        <a class="nav-link link-hover text-primary-color fw-semibold" href="{{ route('login') }}">
                            Connexion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-action-secondary px-3 py-2" href="{{ route('register') }}">
                            Inscription
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Ajout d'un espace pour compenser la hauteur de la navbar -->
<div style="margin-top: 70px;"></div>
