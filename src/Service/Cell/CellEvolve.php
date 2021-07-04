<?php


namespace App\Service\Cell;


use App\Domain\Model\CellInterface;
use App\Infrastructure\Factory\CellFactoryInterface;
use App\Service\Rules\RuleAbstract;

class CellEvolve implements CellEvolveInterface
{
    private iterable $rules;

    private CellFactoryInterface $cellFactory;

    public function __construct(iterable $rules, CellFactoryInterface $cellFactory)
    {
        $this->rules = $rules;

        $this->cellFactory = $cellFactory;
    }

    public function evolveCell(CellInterface $cell, int $LiveNeighbors): CellInterface
    {
        $newCell = clone $cell;

        /** @var RuleAbstract $rule */
        foreach ($this->rules as $rule){
            $rule->apply($newCell, $LiveNeighbors);
        }

        return $newCell;
    }
}