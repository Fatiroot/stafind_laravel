<!-- resources/views/emails/new_offer_notification.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle offre disponible</title>
</head>
<body>
    <h1>Nouvelle offre disponible</h1>
    <p>Bonjour {{ $offer->user->fullname }},</p>
    <p>Une nouvelle offre a été ajoutée sur notre plateforme.</p>
    <p>Voici les détails de la nouvelle offre :</p>
    <ul>
        <li><strong>Titre de l'offre:</strong> {{ $offer->title }}</li>
        <!-- Add more offer details as needed -->
    </ul>
    <p>Vous pouvez consulter cette offre et postuler si vous êtes intéressé(e).</p>
    <p>voici le lien</p>
    <a href="{{ route('UserOffer.show', $offer->id) }}">Click Ici</a>
    <p>Si vous avez des questions ou avez besoin d'assistance, n'hésitez pas à nous contacter.</p>
    <p>Merci,<br>{{ $offer->user->company->name }}</p>
</body>
</html>

