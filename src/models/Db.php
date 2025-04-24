<?php 

// je creé une classe Db, qui reprensentera la connexion a la bdd
class Db {
    private static $instance; // c'est l'instance, qui reprente la co a la bdd , dans vos autres projets php en procedural, vous l'avez nommé $db

    // methode qui permet de se connecter a la bdd, elle est statique, donc appellable via la classe, et pas l'une de ses instances
    protected static function getInstance(){
        try {
            self::$instance = new PDO("mysql:host=localhost;dbname=Library","root",""); // chaine de connexion a la bdd
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // je set la facon dont PDO gerera les erreurs
        } catch (PDOException $err) {
            die($err->getMessage()); // si ca marche pas, j'affiche une erreur
        }
        return self::$instance; // je retourne l'instance qui represente la connexion a la bdd ($db d'habitude)
    }

    // la deconnexion, tres simple, on set juste $instance a null
    protected static function disconnect(){
        self::$instance = null;
    }
}
?>