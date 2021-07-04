<?php


namespace App\Service\Rules;


use App\Domain\Model\CellInterface;

class LiveDiesUnderPopulationRule implements RuleInterface
{

    public function apply(CellInterface &$cell, int $LiveNeighbors): void
    {
        if($cell->isAlive() && $LiveNeighbors < 2){
            $cell->setIsDead(true);
        }
    }
}