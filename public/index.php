<?php

//db et Router
require_once('../core/Router.php');
require_once("../src/models/Db.php");
//les repositories
require_once("../src/models/repositories/PostRepository.php");
require_once("../src/models/repositories/UserRepository.php");
//modeles
require_once("../src/models/Post.php");
require_once("../src/models/User.php");
//le controller abstract
require_once('../src/controllers/Controller.php');
//les autres controlleurs
require_once('../src/controllers/MainController.php');
require_once('../src/controllers/RegisterController.php');
require_once('../src/controllers/LoginController.php');
require_once('../src/controllers/LogoutController.php');
require_once('../src/controllers/PostController.php');
require_once('../src/controllers/BookController.php');
require_once('../src/controllers/AddController.php');
require_once('../src/controllers/UpdateController.php');
require_once('../src/controllers/DeleteController.php');
<<<<<<< HEAD
=======


>>>>>>> c09e0b240d9017f5e8c0c38b79e40d37a021e9da


$router = new Router();
$router->start();

?>