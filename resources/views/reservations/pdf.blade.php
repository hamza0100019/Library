<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Confirmation de Réservation</h1>
    </div>
    <div class="details">
        <p><strong>Nom :</strong> {{ $reservation->user->name }}</p>
        <p><strong>Livres réservé :</strong> {{ $reservation->livre->titre }}</p>
        <p><strong>Auteur :</strong> {{ $reservation->livre->auteur }}</p>
        <p><strong>Date de début :</strong> {{ $reservation->date_debut }}</p>
        <p><strong>Date de fin :</strong> {{ $reservation->date_fin }}</p>
        <p><strong>État :</strong> {{ ucfirst($reservation->etat) }}</p>
    </div>
</body>
</html>
