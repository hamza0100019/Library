<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5F5F5;
            color: #264653;
        }
        .container {
            max-width: 600px;
            margin: 2rem auto;
            background: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
            text-align: center;
        }
        h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #E76F51;
            margin-bottom: 20px;
        }
        p {
            font-size: 1rem;
            line-height: 1.5;
            margin: 10px 0;
        }
        .highlight {
            color: #2A9D8F;
            font-weight: 600;
        }
        .btn {
            display: inline-block;
            background-color: #E76F51;
            color: #FFFFFF;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #F4A261;
            transform: scale(1.05);
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9rem;
            color: #666;
        }
        .footer a {
            color: #E76F51;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .icon {
            font-size: 3rem;
            color: #2A9D8F;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }
            p {
                font-size: 0.95rem;
            }
            .btn {
                font-size: 0.9rem;
                padding: 10px 18px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">📚</div>
        <h1>Bonjour, {{ $user->name }} !</h1>
        <p>Nous avons bien enregistré votre réservation pour le livre :</p>
        <p class="highlight">"{{ $reservation->livre->titre }}"</p>
        <p>Votre réservation est actuellement <strong>en attente de validation</strong> par notre administrateur.</p>
        <p>Vous serez informé dès qu'elle sera validée.</p>
        <a href="{{ url('/') }}" class="btn">Retour à l'accueil</a>
        <div class="footer">
            <p>Merci pour votre confiance,</p>
            <p>L'équipe <a href="{{ url('/') }}">Maktabaty</a></p>
        </div>
    </div>
</body>
</html>
