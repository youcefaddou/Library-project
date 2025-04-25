<?php
require_once __DIR__ . '/../models/repositories/BookRepository.php';

class BookController extends Controller {
    public function index() {
    }

    public function borrow() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = $_POST['book_id'];
            $userId = $_SESSION['user']['id'];
            try {
                BookRepository::borrowBook($bookId, $userId);
            } catch (Exception $e) {
                $err = "Erreur lors de l'emprunt du livre : " . $e->getMessage();
            }
        }

        header("Location: /main");
        exit;
    }

    public function return() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = $_POST['book_id'];
            try {
                BookRepository::returnBook($bookId);
            } catch (Exception $e) {
                $err = "Erreur lors du retour du livre : " . $e->getMessage();
            }
        }

        header("Location: /main");
        exit;
    }
}
?> 