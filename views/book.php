<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/book.css">
    <title>Library App</title>
</head>
<body>
<div class="main-container">
            <div class="post-create-container">
                <h2 class="title-booklist">Librairie</h2>
                <form class="post-form" action="/post/create" method="POST">
                    <input type="text" name="title" placeholder="Titre du livre" class="post-title-input">
                    <input type="text" name="author" placeholder="Auteur" class="post-title-input">
                    <input type="text" name="year" placeholder="Année de parution" class="post-title-input">
                    
                    <button type="submit" class="post-submit-btn">Ajouter</button>
                </form>
            </div>
            <div class="posts-list">
                <h2 class="title-booklist">Liste des livres</h2>
                <?php if (empty($posts)): ?>
                    <p class="no-posts">Aucun livre n'a été trouvé. Ajoutez un livre !</p>
                <?php else: ?>
                    <?php foreach ($books as $book): ?>
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

<?php
$books = BookRepository::getAllBooks();
?>

<div class="books-container">
    <div class="books-header">
        <h2>Bibliothèque</h2>
        <form action="/add" method="POST" class="add-book-form">
            <input type="text" name="title" placeholder="Titre du livre" required>
            <input type="text" name="author" placeholder="Auteur" required>
            <button type="submit" class="add-book-btn">Ajouter un livre</button>
        </form>
    </div>

    <div class="books-grid">
        <?php foreach ($books as $book): ?>
            <div class="book-card">
                <div class="book-info">
                    <h3><?= htmlspecialchars($book['title']) ?></h3>
                    <p class="author"><?= htmlspecialchars($book['author']) ?></p>
                    <p class="status <?= $book['isAvailable'] ? 'available' : 'unavailable' ?>">
                        <?= $book['isAvailable'] ? 'Disponible' : 'Emprunté' ?>
                    </p>
                </div>
                <div class="book-actions">
                    <?php if ($book['isAvailable']): ?>
                        <form action="/book/borrow" method="POST">
                            <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                            <button type="submit" class="borrow-btn">Emprunter</button>
                        </form>
                    <?php elseif ($book['borrower_id'] == $_SESSION['user']['id']): ?>
                        <form action="/book/return" method="POST">
                            <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                            <button type="submit" class="return-btn">Rendre</button>
                        </form>
                    <?php endif; ?>
                    <form action="/update" method="POST" class="edit-form">
                        <input type="hidden" name="id" value="<?= $book['id'] ?>">
                        <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
                        <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>
                        <button type="submit" class="edit-btn">Modifier</button>
                    </form>
                    <form action="/delete" method="POST">
                        <input type="hidden" name="id" value="<?= $book['id'] ?>">
                        <button type="submit" class="delete-btn">Supprimer</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>