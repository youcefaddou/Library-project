Creation d'une interface pour la gestion d'une librairie:

Permet aux utilisateurs de se connecter, d'ajouter des livres  (CRUD),de sélectionner des livres parmi une liste et les emprunter, se déconnecter, en utilisant un modèle MVC.

Plan d'execution:

Controllers:

-LoginController.php pour gérer la connexion
-LogoutController.php pour gérer la déco
-RegisterController.php pour le formulaire d'inscription utilisateur
-MainController.php pour l'affichage des livres, l'ajout, la suppression, modification, ainsi que l'emprunt (avec une colonne qui affiche "Disponible" ou "Indisponible")
-AddController
-UpdateController
-DeleteController
-LendController

Models:
- 2 Repo: - UserRepository pour communiquer avec la Table User
- BookRepository pour communiquer avec la Table Book
-table inter?? a gérer

Un Db.php pour gérer la connexion à MySQL
un User.php pour gérer tout ce qui est relatif à un utilisateur: id, Nom, Prénom, Mail, Password
un Book.php pour gérer les livres: id_book, title, auteur, isAvailable,
Un intermediaire book/auteur etc
Views: 
Un register.php pour afficher le form en 1er
Un login.php pour se connecter à son compte
Un main.php pour afficher la page perso de l'utilisateur une fois connecté
un Error.php pour la gestion des erreurs?