<?php 

class RegisterController {

    public function index() {
        if (isset($_POST['register'])) {
            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $mail = htmlspecialchars($_POST['mail']);
            $password = htmlspecialchars($_POST['password']);
            
            if (!preg_match("/^[A-ÿ'\- ]+$/i", $firstName)) {
                $err = "Le prénom contient des caractères invalides.";
            } elseif (!preg_match("/^[A-ÿ'\- ]+$/i", $lastName)) {
                $err = "Le nom contient des caractères invalides.";
            } elseif (!preg_match("/[A-Z0-9._%+-]+@[A-Z0-9-]+\.[A-Z]{2,4}/im", $mail)) {
                $err = "L'adresse email est invalide.";
            } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,200}$/", $password)) {
                $err = "Le mot de passe ne respecte pas les critères.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
                $user = new User($firstName, $lastName, $mail, $hashedPassword);
                
                try {
                    UserRepository::insertUser($user);
                    $success = "Inscription réussie !";
                } catch (Exception $e) {
                    $err = "Erreur lors de l'enregistrement : " . $e->getMessage();
                }
            }
        }

        require('../views/register.php');
    }
}
?>

