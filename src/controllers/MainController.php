<?php
class MainController extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /login"); 
            exit;
        }
        include '../views/main.php'; 
    }
}

?>