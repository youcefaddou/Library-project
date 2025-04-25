<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
    <link rel="stylesheet" href="/assets/css/book.css">
</head>
<body>
    <div>
        <div class="books-container">
            <div class="books-header">
                <h2>Bibliothèque</h2>
                
                <form action="/add" method="POST" class="add-book-form">
                    <input type="text" name="title" placeholder="Titre du livre">
                    <input type="text" name="author" placeholder="Auteur">
                    <input type="number" name="year" placeholder="Année" min="1600" max="2099">
                    <button type="submit" class="add-book-btn">Ajouter</button>
                </form>
            </div>

            <div class="books-grid">
                <?php if (empty($books)): ?>
                    <p class="no-books">Aucun livre n'a été trouvé. Ajoutez un livre !</p>
                <?php else: ?>
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
                                    <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>">
                                    <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>">
                                    <button type="submit" class="edit-btn">Modifier</button>
                                </form>
                                <form action="/delete" method="POST">
                                    <input type="hidden" name="id" value="<?= $book['id'] ?>">
                                    <button type="submit" class="delete-btn">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>