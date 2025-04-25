<?php

class LoginController
{
    public function index()
    {
        session_start(); 

        if (isset($_POST['login'])) {
            $mail = htmlspecialchars($_POST['mail']);
            $password = htmlspecialchars($_POST['password']);
            if (!preg_match("/[A-Z0-9._%+-]+@[A-Z0-9-]+\.[A-Z]{2,4}/im", $mail)) {
                $err = "L'adresse email est invalide.";
            } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,200}$/", $password)) {
                $err = "Le mot de passe ne respecte pas les critères.";
            }
             else {
                try {
                    $user = UserRepository::getUserByMail($mail);
                    if ($user && password_verify($password, $user['password'])) {
                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'firstName' => $user['firstName'],
                            'lastName' => $user['lastName'],
                            'mail' => $user['mail']
                        ];
                        header("Location: /main"); 
                        exit;
                    } else {
                        $err = "Email ou mot de passe incorrect.";
                    }
                } catch (Exception $e) {
                    $err = "Erreur lors de la connexion : " . $e->getMessage();
                }
            }
        }

        include '../views/login.php';
    }
}