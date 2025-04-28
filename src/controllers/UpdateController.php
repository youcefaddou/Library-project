<?php
require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/repositories/BookRepository.php';

class UpdateController extends Controller {
    public function index() {
        // if (!isset($_SESSION['user'])) {
        //     header("Location: /login");
        //     exit;
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = $_POST['book_id'];
            $title = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);
            $year = htmlspecialchars($_POST['year']);

            if (empty($title) || empty($author) || empty($year)) {
                $_SESSION['error'] = "Tous les champs sont obligatoires";
            } else {
                try {
                    $book = BookRepository::getBookById($bookId);
                    if ($book) {
                        $bookObj = new Book(
                            $title,
                            $author,
                            $year,
                            $book['isAvailable'],
                            $book['borrower_id'],
                            $book['user_id']
                        );
                        $bookObj->setId($bookId);
                        BookRepository::updateBook($bookObj);
                    }
                    header("Location: /main");
                    exit;
                } catch (Exception $e) {
                    $_SESSION['error'] = "Erreur lors de la modification du livre.";
                }
            }
        }

        header("Location: /main");
        exit;
    }
}
?>