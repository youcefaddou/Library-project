<?php
//Db et Router
require_once('../core/Router.php');
require_once('../src/models/Db.php');
//Les repositories
require_once('../src/models/repositories/UserRepository.php');

//Les modèles
require_once('../src/models/User.php');
//Les controllers
require_once('../src/controllers/RegisterController.php');

$router = new Router();
$router->start();

?>