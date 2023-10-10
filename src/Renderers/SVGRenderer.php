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
                    $forme->getPoint1()->getX1(),
                    $forme->getPoint1()->getY1(),
                    $forme->getPoint2()->getX2(),
                    $forme->getPoint2()->getY2()
                );
                $line->setStyle('stroke', $forme->getCouleur()); 
                $doc->addChild($line);
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
