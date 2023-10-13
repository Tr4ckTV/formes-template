<?php

namespace Opmvpc\Formes\Renderers;

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Rectangle;
use Opmvpc\Formes\Cercle;
use Opmvpc\Formes\Ligne;
use Opmvpc\Formes\Polygone;
use SVG\Nodes\Shapes\SVGCircle;
use SVG\Nodes\Shapes\SVGLine;
use SVG\Nodes\Shapes\SVGPolygon;
use SVG\Nodes\Shapes\SVGRect;
use SVG\SVG;

class SVGRenderer implements Renderer
{
    private Canvas $canvas;

    public function __construct(Canvas $canvas)
    {
        $this->canvas = $canvas;
    }

    public function render(): string
    {
        $image = new SVG($this->canvas->getWidth(), $this->canvas->getHeight());
        $doc = $image->getDocument();

        $square = new SVGRect(0, 0, $this->canvas->getWidth(), $this->canvas->getHeight());
        $doc->setStyle('fill', $this->canvas->getCouleur()); 
        $doc->addChild($square);

        foreach ($this->canvas->getFormes() as $forme) {
            if ($forme instanceof Ligne) 
            {
                $line = new SVGLine(
                    $forme->getPoint1()->getx(),
                    $forme->getPoint1()->gety(),
                    $forme->getPoint2()->getx(),
                    $forme->getPoint2()->gety()                    
                );
                $line->setStyle('fill', $forme->getCouleur()); 
                $doc->addChild($line);
            } 
            elseif ($forme instanceof Rectangle) 
            {
                $rectangle = new SVGRect(
                    $forme->getPoint()->getX(),
                    $forme->getPoint()->getY(),
                    $forme->getWidth(),
                    $forme->getHeight()
                );
                $rectangle->setStyle('fill', $forme->getCouleur());
                $doc->addChild($rectangle);
            }
            elseif ($forme instanceof Polygone)
            {
                $points = $forme->getPoints();
                $polygone = new SVGPolygon();
                    foreach ($points as $point) 
                    {
                        $polygone->addPoint($point->getX(), $point->getY());
                    }
                $polygone->setStyle('fill', $forme->getCouleur());
                $doc->addChild($polygone);
            }
            elseif ($forme instanceof Cercle) 
            {
                $circle = new SVGCircle(
                    $forme->getCentre()->getX(),
                    $forme->getCentre()->getY(),
                    $forme->getRayon()
                );
                $circle->setStyle('fill', $forme->getCouleur());
                $doc->addChild($circle);
            }
        }

        return $image->toXMLString();
    }

    public function save(string $path): void{}
}
