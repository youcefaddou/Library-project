<?php 

class Auteur {
    private $nomAuteur;
    private $prenomAuteur;
    private $idAuteur;
    private $livres = []; 

    public function __construct($nomAuteur, $prenomAuteur, $idAuteur)
    {
        $this->setNomAuteur($nomAuteur);  
        $this->setPrenomAuteur($prenomAuteur);  
        $this->setidAuteur($idAuteur);  
    }

    public function setNomAuteur($nomAuteur) {
        $this->nomAuteur = $nomAuteur;
    }

    public function getNomAuteur() {
        return $this->nomAuteur;
    }

    public function setPrenomAuteur($prenomAuteur) {
        $this->prenomAuteur = $prenomAuteur;
    }

    public function getPrenomAuteur() {
        return $this->prenomAuteur;
    }

    public function setidAuteur($idAuteur) {
        $this->idAuteur = $idAuteur;
    }

    public function getidAuteur() {
        return $this->idAuteur;
    }

    public function ajouterLivre(Livres $livre): void
    {
        $this->livres[] = $livre;
    }

    public function getLivres(): array
    {
        return $this->livres;
    }
}
?>