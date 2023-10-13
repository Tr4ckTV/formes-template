<?php

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Ellipse;
use Opmvpc\Formes\Forme;
use Opmvpc\Formes\Point;

it('is a Ellipse', function () {
    $ellipse = new Ellipse(new Point(0, 0), 10, 5);
    expect($ellipse)->toBeInstanceOf(Ellipse::class);
    expect($ellipse)->toBeInstanceOf(Forme::class);
    expect($ellipse->getCentre())->toBeInstanceOf(Point::class);
    expect($ellipse->getRayonX())->toBe(10.0);
    expect($ellipse->getRayonY())->toBe(5.0);
    expect($ellipse->getCouleur())->toBe('#000000');
});

it('can be added to canvas', function () {
    $canvas = new Canvas(100, 100);
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toBeEmpty();
    $canvas->add(new Ellipse(new Point(0, 0), 10, 5));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(1);
    $canvas->add(new Ellipse(new Point(0, 0), 10, 5));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(2);
});
