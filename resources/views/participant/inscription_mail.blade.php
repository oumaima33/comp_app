<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation d'inscription</title>
</head>
<body>
    <h2>Confirmation d'inscription</h2>
    <p>Bonjour {{ $details['name'] }},</p>
    <p>Votre inscription a été confirmée avec succès.</p>
    
    <h3>Détails de l'inscription :</h3>
    <ul>
        <li>Nom : {{ $details['name'] }}</li>
        <li>Email : {{ $details['email'] }}</li>
        <li>Code de compétition : {{ $details['comp_code'] }}</li>
        <li>ID de compétition : {{ $details['competition_id'] }}</li>
    </ul>
    
    <p>Merci de votre participation.</p>
</body>
</html>
