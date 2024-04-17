<!-- resources/views/emails/accept_account.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Acceptation de compte</title>
</head>
<body>
    <h1>Félicitations, votre compte est accepté !</h1>
    <p>Bonjour {{ $user->fullname }},</p>
    <p>Nous sommes heureux de vous informer que votre compte a été accepté.</p>
    <p>Vous pouvez maintenant vous connecter et accéder à toutes les fonctionnalités de notre plateforme.</p>
    <p>Si vous avez des questions ou avez besoin d'assistance, n'hésitez pas à nous contacter.</p>
    <p>Merci</p>
</body>
</html>
