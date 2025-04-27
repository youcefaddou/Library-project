<?php

class PostController extends Controller {
    
    public function index() {

    }
    public function create() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $userId = $_SESSION['user']['id'];

            $post = new Post();
            $post->setTitle($title);
            $post->setContent($content);
            $post->setUserId($userId);

            PostRepository::insertPost($post);
        }
        header("Location: /main"); 
        exit;
    }

    public function edit() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $postId = intval($_POST['id']);
            $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : null;
            $content = isset($_POST['content']) ? htmlspecialchars($_POST['content']) : null;
            $userId = $_SESSION['user']['id'];
            $post = PostRepository::getPostById($postId);
            if ($post && $post['user_id'] == $userId && $title && $content) {
                PostRepository::updatePost($postId, $title, $content);
            }
        }
        header("Location: /main");
        exit;
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $postId = intval($_POST['id']);
            $userId = $_SESSION['user']['id'];
            $post = PostRepository::getPostById($postId);
            if ($post && $post['user_id'] == $userId) {
                PostRepository::deletePost($postId);
            }
        }
        header("Location: /main");
        exit;
    }
}