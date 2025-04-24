<?php

require_once 'Personne.php';

class Emprunteur extends Personne
{
    private $livresEmpruntes = [];

    public function getLivre(): array
    {
        return $this->livresEmpruntes;
    }

    public function emprunterLivre(Livres $livre): bool
    {
        if ($livre->emprunter()) {
            $this->livresEmpruntes[] = $livre;
            return true;
        }
        return false;
    }

    public function rendreLivre(Livres $livre): void
    {
        if (($index = array_search($livre, $this->livresEmpruntes, true)) !== false) {
            unset($this->livresEmpruntes[$index]);
            $livre->rendre();
        }
    }
}

