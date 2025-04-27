<?php
require_once __DIR__ . '/../models/repositories/BookRepository.php';

class DeleteController extends Controller {
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = $_POST['book_id'];
            try {
                BookRepository::deleteBook($bookId);
            } catch (Exception $e) {
                $err = "Erreur lors de la suppression du livre : " . $e->getMessage();
            }
        }

        header("Location: /main");
        exit;
    }
}
