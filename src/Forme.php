<?php

namespace Opmvpc\Formes;

abstract class Forme {
    protected string $couleur;

    function __construct($couleur) {
        $this->couleur = $couleur;
    }

    public function setCouleur($couleur) {
        $this->couleur = $couleur;
    }

    public function getCouleur(): string {
        return $this->couleur;
    }
}

