<?php
require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/repositories/BookRepository.php';

class AddController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);

            if (empty($title) || empty($author)) {
                $err = "Tous les champs sont obligatoires";
            } else {
                $book = new Book($title, $author);
                try {
                    BookRepository::insertBook($book);
                    header("Location: /main");
                    exit;
                } catch (Exception $e) {
                    $err = "Erreur lors de l'ajout du livre : " . $e->getMessage();
                }
            }
        }

        include __DIR__ . '/../../views/main.php';
    }
}
