<!-- resources/views/emails/unban_user.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Réactivation de compte</title>
</head>
<body>
    <h1>Votre compte a été réactivé !</h1>
    <p>Bonjour {{ $user->fullname }},</p>
    <p>Nous sommes heureux de vous informer que votre compte a été réactivé.</p>
    <p>Vous pouvez maintenant vous connecter et accéder à toutes les fonctionnalités de notre plateforme.</p>
    <p>Si vous avez des questions ou avez besoin d'assistance, n'hésitez pas à nous contacter.</p>
    <p>Merci</p>
</body>
</html>
