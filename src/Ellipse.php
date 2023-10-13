<?php

namespace Opmvpc\Formes;

class Ellipse extends Forme {
    private float $rayonX;
    private float $rayonY;
    private Point $center;

    public function __construct(Point $centre, float $rayonX, float $rayonY, string $couleur = '#000000') {
        parent::__construct($couleur);
        $this->rayonX = $rayonX;
        $this->rayonY = $rayonY;
        $this->centre = $centre;
    }

    public function getCentre(): Point {
        return $this->centre;
    }

    public function getRayonX(): float {
        return $this->rayonX;
    }

    public function getRayonY(): float {
        return $this->rayonY;
    }
}

