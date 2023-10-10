<?php

namespace Opmvpc\Formes;

class Canvas extends Forme {
    private float $width;
    private float $height;
    private array $formes = [];

    public function __construct(float $width, float $height) {
        parent::__construct('#FFFFFF');
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): float {
        return $this->width;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function getFormes(): array {
        return $this->formes;
    }

    public function add(Forme $forme): void {
        $this->formes[] = $forme;
    }
}

