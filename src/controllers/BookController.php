<?php
require_once __DIR__ . '/../models/repositories/BookRepository.php';

class BookController extends Controller {
    public function index() {
    }

    public function borrow() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = $_POST['book_id'];
            $userId = $_SESSION['user']['id'];
            try {
                $book = BookRepository::getBookById($bookId);
                if ($book && $book['isAvailable']) {
                    BookRepository::borrowBook($bookId, $userId);
                }
            } catch (Exception $e) {
                $_SESSION['error'] = "Erreur lors de l'emprunt du livre.";
            }
        }

        header("Location: /main");
        exit;
    }

    public function return() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = $_POST['book_id'];
            try {
                $book = BookRepository::getBookById($bookId);
                if ($book && $book['borrower_id'] == $_SESSION['user']['id']) {
                    BookRepository::returnBook($bookId);
                }
            } catch (Exception $e) {
                $_SESSION['error'] = "Erreur lors du retour du livre.";
            }
        }

        header("Location: /main");
        exit;
    }

    public function add() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $author = $_POST['author'] ?? '';
            $year = $_POST['year'] ?? null;
            $userId = $_SESSION['user_id'];

            try {
                $book = new Book($title, $author, $year, true, null, $userId);
                BookRepository::insertBook($book);
                header('Location: /');
                exit;
            } catch (Exception $e) {
                $_SESSION['error'] = "Une erreur est survenue lors de l'ajout du livre.";
            }
        }
    }
}
?> 