<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation Validée</title>
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
            max-width: 700px;
            margin: 2rem auto;
            background: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #E76F51;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #264653;
            color: #FFF;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #F9F9F9;
        }
        tr:hover {
            background-color: #F1F1F1;
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
            text-align: center;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #F4A261;
            transform: scale(1.05);
        }
        .signature {
            margin-top: 30px;
            text-align: center;
            color: #666;
        }
        .signature a {
            color: #E76F51;
            text-decoration: none;
        }
        .signature a:hover {
            text-decoration: underline;
        }
        .icon {
            font-size: 4rem;
            color: #2A9D8F;
            text-align: center;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            p, th, td {
                font-size: 0.9rem;
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
        <h1>Merci pour votre réservation, {{ $user->name }} !</h1>
        <p>Votre réservation pour le livre <strong>"{{ $reservation->livre->titre }}"</strong> a été validée avec succès. Voici les détails :</p>

        <!-- Tableau des détails -->
        <table>
            <tr>
                <th>Titre du livre</th>
                <td>{{ $reservation->livre->titre }}</td>
            </tr>
            <tr>
                <th>Auteur</th>
                <td>{{ $reservation->livre->auteur }}</td>
            </tr>
            <tr>
                <th>Date de début</th>
                <td>{{ \Carbon\Carbon::parse($reservation->date_debut)->locale('fr')->isoFormat('LL') }}</td>
            </tr>
            <tr>
                <th>Date de fin</th>
                <td>{{ \Carbon\Carbon::parse($reservation->date_fin)->locale('fr')->isoFormat('LL') }}</td>
            </tr>
            <tr>
                <th>État</th>
                <td><span style="color: #2A9D8F; font-weight: bold;">Validée</span></td>
            </tr>
        </table>

        <!-- Lien pour télécharger le reçu -->
        <div class="text-center">
            <a href="{{ route('reservations.index') }}" class="btn">📄 Télécharger le reçu</a>
        </div>

        <!-- Remerciements et signature -->
        <div class="signature">
            <p>Merci pour votre confiance,</p>
            <p>L'équipe <a href="{{ url('/') }}">Maktabaty</a></p>
        </div>
    </div>
</body>
</html>
