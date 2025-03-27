<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Application')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #264653; /* Texte principal */
            margin: 0;
            padding: 0;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: fadeIn 1s ease-in-out;
            color: #F5F5F5;
            padding: 50px 15px;
        }

        .hero .hero-text {
            animation: slideIn 1s ease-in-out;
            max-width: 600px;
        }

        .hero-image {
            animation: zoomIn 1.3s ease-in-out;
            max-width: 40%;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-action {
            background-color: #E76F51; /* Couleur principale */
            color: #264653; /* Blanc cassé */
            font-weight: bold;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            text-align: center;
            cursor: pointer;
            box-shadow: 0px 5px 15px rgba(231, 111, 81, 0.4);
        }

        .btn-action:hover {
            background-color: #F4A261; /* Couleur accentuée */
            transform: scale(1.1);
            box-shadow: 0px 8px 20px rgba(244, 162, 97, 0.6);
        }

        .btn-action-secondary {
            background-color: transparent;
            color: #00000;
            border: 2px solid #F5F5F5;
            padding: 12px 24px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            text-align: center;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
        }

        .btn-action-secondary:hover {
            color: #E76F51;
            border-color: #E76F51;
        }
        /* Responsivité : centrer contenu sur mobile */
        @media (max-width: 992px) {
            .hero {
                text-align: center;
                flex-direction: column;
                padding: 30px 15px;
            }

            .hero-image {
                display: none;
            }

            .btn-action-secondary {
                justify-content: center;
            }
        }

        .hero-image {
        max-width: 90%; /* Augmente la largeur de l'image */
        height: auto; /* Maintient le ratio d'aspect */
        animation: fadeIn 1.2s ease-in-out;
        margin-top: 20px; /* Ajoute un espace pour l'image */
        }

        @media (min-width: 1200px) {
            .hero-image {
                max-width: 80%; /* Ajuste la taille de l'image sur grands écrans */
            }
        }

        .d-flex.align-items-center.min-vh-100 {
            padding-top: 50px; /* Ajout d'espace pour respirer */
            padding-bottom: 50px;
        }

    </style>
    <style>
        /* Couleurs de la charte */
        :root {
            --primary-color: #264653; /* Bleu profond */
            --accent-color: #E76F51; /* Orange vif */
            --background-blur: rgba(255, 255, 255, 0.8); /* Fond flou translucide */
        }

        /* Style de la navbar */
        .bg-blur {
            background: var(--background-blur);
            backdrop-filter: blur(10px); /* Effet de flou */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Légère ombre */
            transition: background-color 0.3s ease;
        }

        .navbar-brand {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .nav-link {
            color: var(--primary-color);
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--accent-color);
        }

        .btn-accent-color {
            background-color: var(--accent-color);
            border: none;
            font-weight: bold;
        }

        .btn-accent-color:hover {
            box-shadow: 0px 4px 15px rgba(231, 111, 81, 0.5);
        }

        /* Réponse pour mobile */
        @media (max-width: 992px) {
            .navbar-nav {
                text-align: center;
            }
        }

    </style>
    <style>
        /* Couleurs de la charte */
        :root {
            --primary-color: #264653; /* Bleu profond */
            --accent-color: #E76F51; /* Orange vif */
            --text-muted: #A1A1A1; /* Gris clair pour le texte secondaire */
        }

        /* Footer */
        footer {
            background-color: var(--primary-color);
            color: #F5F5F5;
            padding: 50px 15px;
            border-top: 4px solid var(--accent-color);
        }

        footer h5 {
            font-size: 1.25rem;
            margin-bottom: 20px;
        }

        footer p {
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .footer-link {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--accent-color);
        }

        .social-link {
            font-size: 1.5rem;
            color: var(--text-muted);
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .social-link:hover {
            color: var(--accent-color);
            transform: scale(1.1);
        }

        hr {
            border-color: var(--text-muted);
            opacity: 0.5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            footer h5 {
                text-align: center;
            }

            footer .text-center {
                text-align: center !important;
            }
        }
        .why-maktabaty {
            padding: 50px 15px;
        }

        .why-maktabaty h2 {
            color: var(--accent-color);
            font-weight: bold;
        }

        .why-maktabaty p.lead {
            color: var(--muted-color);
        }

        /* Cartes */
        .card {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card .icon {
            color: var(--accent-color);
        }

        .card h5 {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .card p {
            color: var(--muted-color);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Responsivité */
        @media (max-width: 768px) {
            .why-maktabaty h2 {
                font-size: 1.75rem;
            }

            .card h5 {
                font-size: 1rem;
            }

            .card p {
                font-size: 0.9rem;
            }
        }

        /* Section login */
        .login-section {
            padding: 50px 15px;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-in-out;
        }

        .card-header {
            border-bottom: none;
        }

        /* .card-footer {
            font-size: 0.9rem;
            background-color: #F8F9FA;
        } */

        /* Input group */
        .input-group-text {
            border: none;
            color: var(--primary-color);
        }

        .input-group .form-control {
            border: none;
            border-radius: 0 10px 10px 0;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Boutons */
        .btn-accent-color {
            background-color: var(--accent-color);
            border: none;
        }

        .btn-accent-color:hover {
            box-shadow: 0px 8px 15px rgba(231, 111, 81, 0.5);
        }


        /* Responsivité */
        @media (max-width: 768px) {
            .card {
                margin-top: 20px;
            }

            .input-group-text {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body class=" font-poppins text-gray-900">

    @include('partials.navbar')
    <main class="container my-5">
        @yield('content')
    </main>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
