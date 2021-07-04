<?php


namespace App\Service\Rules;


use App\Domain\Model\CellInterface;

class LiveDiesForMoreThanThreeNeighborsRule implements RuleInterface
{

    public function apply(CellInterface &$cell, int $LiveNeighbors): void
    {
        if($cell->isAlive() && $LiveNeighbors > 3){
            $cell->setIsDead(true);
        }
    }
}