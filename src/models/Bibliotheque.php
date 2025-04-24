<?php 

class Bibliotheque {
    private $livres = [];
    private $emprunteurs = [];

    public function ajouterLivre(Livres $livre): void
    {
        $this->livres[] = $livre;
    }

    public function listerLivres(): array
    {
        return $this->livres;
    }

    public function ajouterEmprunteur(Emprunteur $emprunteur): void
    {
        $this->emprunteurs[] = $emprunteur;
    }

    public function listerEmprunteurs(): array
    {
        return $this->emprunteurs;
    }
}
?>