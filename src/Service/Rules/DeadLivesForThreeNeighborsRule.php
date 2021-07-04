<?php


namespace App\Service\Rules;


use App\Domain\Model\CellInterface;

class DeadLivesForThreeNeighborsRule implements RuleInterface
{

    public function apply(CellInterface &$cell, int $LiveNeighbors): void
    {
        if($cell->isDead() && $LiveNeighbors == 3){
            $cell->setIsDead(false);
        }
    }
}