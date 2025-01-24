<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçu de Réservation</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #E76F51;
            padding-bottom: 10px;
        }
        header img {
            height: 50px;
            margin-bottom: 10px;
        }
        header h1 {
            font-size: 1.8rem;
            color: #264653;
        }
        header p {
            font-size: 0.9rem;
            color: #666;
        }
        .content {
            margin-top: 20px;
        }
        h2 {
            color: #264653;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 10px 0;
            font-size: 1rem;
        }
        .details p strong {
            color: #2A9D8F;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #264653;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .status {
            text-align: center;
            font-size: 1rem;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            color: #fff;
            font-weight: bold;
        }
        .status.validated {
            background-color: #2A9D8F;
        }
        .status.pending {
            background-color: #FFC107;
            color: #856404;
        }
        .status.cancelled {
            background-color: #DC3545;
        }
        footer {
            margin-top: 30px;
            text-align: center;
            border-top: 2px solid #E76F51;
            padding-top: 10px;
            font-size: 0.8rem;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Reçu de Réservation</h1>
        <p>Merci d'avoir utilisé notre service de réservation.</p>
    </header>

    <div class="container">
        <h2>Détails de la Réservation</h2>

        <!-- Tableau des détails -->
        <table>
            <tr>
                <th>Titre du Livre</th>
                <td>{{ $reservation->livre->titre }}</td>
            </tr>
            <tr>
                <th>Auteur</th>
                <td>{{ $reservation->livre->auteur }}</td>
            </tr>
            <tr>
                <th>Utilisateur</th>
                <td>{{ $reservation->user->name }} ({{ $reservation->user->email }})</td>
            </tr>
            <tr>
                <th>Date de Début</th>
                <td>{{ \Carbon\Carbon::parse($reservation->date_debut)->locale('fr')->isoFormat('LL') }}</td>
            </tr>
            <tr>
                <th>Date de Fin</th>
                <td>{{ \Carbon\Carbon::parse($reservation->date_fin)->locale('fr')->isoFormat('LL') }}</td>
            </tr>
        </table>

        <!-- État de la réservation -->
        <div class="status {{ $reservation->etat === 'validee' ? 'validated' : ($reservation->etat === 'en_attente' ? 'pending' : 'cancelled') }}">
            @if($reservation->etat === 'validee')
                Réservation Validée
            @elseif($reservation->etat === 'en_attente')
                En Attente de Validation
            @else
                Réservation Annulée
            @endif
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Maktabaty. Tous droits réservés.</p>
        <p>Si vous avez des questions, contactez-nous à <a href="mailto:support@maktabaty.com">support@maktabaty.com</a></p>
    </footer>
</body>
</html>
