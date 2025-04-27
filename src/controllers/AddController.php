<?php
require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/repositories/BookRepository.php';

class AddController extends Controller
{
    public function index()
    {   
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);
            $year = htmlspecialchars($_POST['year']);
            $userId = $_SESSION['user']['id'];

            if (empty($title) || empty($author) || empty($year)) {
                $err = "Tous les champs sont obligatoires";
            } else {
                $book = new Book($title, $author, $year, true, null, $userId);
                try {
                    BookRepository::insertBook($book);
                    header("Location: /main");
                    exit;
                } catch (Exception $e) {
                    $err = "Erreur lors de l'ajout du livre : " . $e->getMessage();
                }
            }
        }

        try {
            $books = BookRepository::getAllBooks();
        } catch (Exception $e) {
            $err = "Erreur lors de la récupération des livres : " . $e->getMessage();
            $books = [];
        }

        include __DIR__ . '/../../views/book.php';
    }
}
