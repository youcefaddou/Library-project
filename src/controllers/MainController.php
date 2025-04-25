<?php
require_once __DIR__ . '/../models/repositories/PostRepository.php';

class MainController extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login"); 
            exit;
        }
        
        try {
            $posts = PostRepository::getAllPosts();
            include __DIR__ . '/../../views/main.php';
        } catch (Exception $e) {
            $err = "Erreur lors de la récupération des posts : " . $e->getMessage();
            include __DIR__ . '/../../views/main.php';
        }
    }
}

?>