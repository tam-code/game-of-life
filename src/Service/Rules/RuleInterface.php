<?php


namespace App\Service\Rules;


use App\Domain\Model\CellInterface;

interface RuleInterface
{
    public function apply(CellInterface &$cell, int $LiveNeighbors): void;
}