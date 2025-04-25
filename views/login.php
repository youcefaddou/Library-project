<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body>
<h1 class="site-title">Library App</h1>
<div class="main-container">
    <h2 class="form-title">Connexion</h2>
    <a href="/"><button type="submit" name="back" class="back-btn">Retour au formulaire</button></a>
    <form class="registerContainer" action="/login" method="POST">
        <div class="form-row">
            <input type="text" name="mail" placeholder="Email">
            <input type="password" name="password" placeholder="Mot de passe">
            <button type="submit" name="login" class="connect-btn-container">Se connecter</button>
        </div>
    </form>
    <p><?= isset($err) ? $err : "" ?></p>
</div>
</body>
</html>