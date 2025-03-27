<nav class="navbar navbar-expand-lg fixed-top shadow-sm py-3" style="backdrop-filter: blur(10px); background-color: rgba(255, 255, 255, 0.85); font-family: 'Poppins', sans-serif;">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}" style="font-family: 'Montserrat', sans-serif; font-size: 1.5rem;">
            📚 My Library
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-2 gap-lg-4">
                <!-- Liens généraux -->
                <li class="nav-item">
                    <a class="nav-link nav-hover text-dark fw-semibold" href="{{ route('books.searchView') }}">Livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-hover text-dark fw-semibold" href="{{ route('reservations.index') }}">Réservations</a>
                </li>

                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-hover text-dark fw-semibold" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-tools me-1"></i> Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users') }}"><i class="bi bi-people me-2"></i>Utilisateurs</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.books') }}"><i class="bi bi-book me-2"></i>Livres</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.reservations') }}"><i class="bi bi-calendar-event me-2"></i>Réservations</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.reports') }}"><i class="bi bi-bar-chart-line me-2"></i>Rapports</a></li>
                            </ul>
                        </li>
                    @endif

                    <!-- Utilisateur connecté -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-hover text-dark fw-semibold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> Profil
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="bi bi-person me-2"></i>Mon Profil</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">@csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Invité -->
                    <li class="nav-item">
                        <a class="nav-link nav-hover text-dark fw-semibold" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary px-3 py-2 rounded-pill" href="{{ route('register') }}">Inscription</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div style="margin-top: 80px;"></div>

<style>
    .nav-hover {
        transition: all 0.3s ease;
    }
    .nav-hover:hover {
        color: #2563eb !important;
        transform: translateY(-1px);
        text-shadow: 0 1px 2px rgba(37, 99, 235, 0.2);
    }

    .dropdown-menu {
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    }

    .dropdown-item {
        transition: background-color 0.3s, color 0.3s;
    }

    .dropdown-item:hover {
        background-color: #f0f4ff;
        color: #2563eb;
    }

    .btn-outline-primary {
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #2563eb;
        color: #fff;
        border-color: #2563eb;
        box-shadow: 0 2px 10px rgba(37, 99, 235, 0.2);
    }
</style>
