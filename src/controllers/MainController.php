<?php
require_once __DIR__ . '/../models/repositories/PostRepository.php';
require_once __DIR__ . '/../models/repositories/BookRepository.php';

class MainController extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login"); 
            exit;
        }
        
        try {
            $posts = PostRepository::getAllPosts();
            $books = BookRepository::getAllBooks();
            include __DIR__ . '/../../views/main.php';
        } catch (Exception $e) {
            $_SESSION['error'] = "Erreur lors de la récupération des données.";
            include __DIR__ . '/../../views/main.php';
        }
    }
}

?>