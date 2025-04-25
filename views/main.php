<?php

if (!isset($_SESSION['user'])) {
    header("Location: /login");
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library App</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <div class="logout-container">
        <form action="/logout" method="POST">
            <button type="submit" class="LogoutButton">Se déconnecter</button>
        </form>
    </div>
    <div class="left-column">
        <h1 class="site-title">Bienvenue, <?= htmlspecialchars($user['firstName']) ?> <?= htmlspecialchars($user['lastName']) ?> !</h1>

        <div class="main-container">
            <div class="post-create-container">
                <h2>Créer un nouveau post</h2>
                <form class="post-form" action="/post/create" method="POST">
                    <input type="text" name="title" placeholder="Titre du post" class="post-title-input">
                    <textarea name="content" placeholder="Votre message..." class="post-content-textarea"></textarea>
                    <button type="submit" class="post-submit-btn">Publier</button>
                </form>
            </div>
            <div class="posts-list">
                <h2>Fil des Posts</h2>
                <?php if (empty($posts)): ?>
                    <p class="no-posts">Aucun post n'a été trouvé. Soyez le premier à poster !</p>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="post-card">
                            <div class="post-header">
                                <span class="post-title"><?= htmlspecialchars($post['title']) ?></span>
                                <span class="post-author">par <?= htmlspecialchars($post['firstName']) ?></span>
                            </div>
                            <div class="post-content">
                                <?php if (isset($_POST["editView"]) && $_POST["editView"] == $post['id']): ?>
                                    <form action="/post/edit" method="POST" class="post-form">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
                                        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" class="post-title-input">
                                        <textarea name="content" class="post-content-textarea"><?= htmlspecialchars($post['content']) ?></textarea>
                                        <button class="post-confirm-btn" type="submit">Confirmer</button>
                                    </form>
                                <?php else: ?>
                                    <?= nl2br(html_entity_decode(htmlspecialchars($post['content']))) ?>
                                <?php endif; ?>
                            </div>
                            <?php if ($post['user_id'] == $user['id']): ?>
                                <div class="post-actions">
                                    <?php if (!(isset($_POST["editView"]) && $_POST["editView"] == $post['id'])): ?>
                                        <form action="" method="POST">
                                            <input type="hidden" name="editView" value="<?= $post['id'] ?>">
                                            <button class="post-edit-btn" type="submit">Modifier</button>
                                        </form>
                                    <?php endif; ?>
                                    <form action="/post/delete" method="POST">
                                        <input type="hidden" name="id" value="<?= $post['id'] ?>">
                                        <button class="post-delete-btn" type="submit">Supprimer</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="right-column">
            <?php include 'book.php';   ?>                        
    </div>
</body>

</html>