<?php 
require_once 'db.php';
require_once 'models/Auteur.php';
require_once 'models/Livres.php';
require_once 'models/Emprunteur.php';
require_once 'models/Bibliotheque.php';

$connect = new Db();

$bibliotheque = new Bibliotheque();

$auteur = new Auteur("Hugo", "Victor", 1);

$livre1 = new Livres("Les Misérables", $auteur, 1862);
$livre2 = new Livres("Notre-Dame de Paris", $auteur, 1831);

$bibliotheque->ajouterLivre($livre1);
$bibliotheque->ajouterLivre($livre2);

$emprunteur = new Emprunteur("Jean", "Lescroc");

$bibliotheque->ajouterEmprunteur($emprunteur);

if ($emprunteur->emprunterLivre($livre1)) {
    echo "Livre emprunté : " . $livre1->getTitre() . "<br>";
} else {
    echo "Le livre n'est pas disponible.";
}

foreach ($bibliotheque->listerLivres() as $livre) {
    echo $livre->afficherInfos();
}