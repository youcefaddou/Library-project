<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/register.css">
    <title>Formulaire d'inscription</title>
</head>

<body>
    <h1>Union Library</h1>
    <nav>

        <div class="connect-btn-container">
            <form action="/login" method="POST">
                <button type="submit" class="login-btn">Se Connecter</button>
            </form>
        </div>
    </nav>

    <section id="mainContainer">
        <div>
            <h2>Formulaire d'inscription</h2>
            <form action="/" method="post">
                <input type="text" name="firstName" placeholder="Prénom">
                <input type="text" name="lastName" placeholder="Nom">
                <input type="email" name="mail" placeholder="Email">
                <input type="password" name="password" placeholder="Mot de passe">
                <button type="submit" name="register">S'inscrire</button>
            </form>
        </div>
    </section>
</body>

</html>