<?php


namespace App\Service\Rules;


use App\Domain\Model\CellInterface;

class LiveForTwoThreeNeighborsRule implements RuleInterface
{

    public function apply(CellInterface &$cell, int $LiveNeighbors): void
    {
        if($cell->isAlive() && ($LiveNeighbors == 2 || $LiveNeighbors == 3)){
            $cell->setIsDead(false);
        }
    }
}