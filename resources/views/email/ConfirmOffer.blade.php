<!-- resources/views/emails/confirm_offer.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation d'offre</title>
</head>
<body>
    <h1>Confirmation de votre offre</h1>
    <p>Bonjour {{ $offer->user->fullname }},</p>
    <p>Nous sommes ravis de vous informer que votre offre a été confirmée avec succès.</p>
    <p>Voici les détails de votre offre :</p>
    <ul>
        <li><strong>Titre de l'offre:</strong> {{ $offer->title }}</li>
        <!-- Add more offer details as needed -->
    </ul>
    <p>Vous pouvez maintenant poursuivre avec les prochaines étapes concernant cette offre.</p>
    <p>Si vous avez des questions ou avez besoin d'assistance, n'hésitez pas à nous contacter.</p>
    <p>Merci,<br>{{ $offer->user->company->name }}</p>
</body>
</html>

