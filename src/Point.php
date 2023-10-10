<?php

namespace Opmvpc\Formes;

class Point {
    private int $x;
    private int $y;

    public function __construct(float $x = 0, float $y = 0, string $couleur = '#000000') {
        $this->x = $x;
        $this->y = $y;
    }

    public function getx(): float {
        return $this->x;
    }

    public function gety(): float {
        return $this->y;
    }
}


