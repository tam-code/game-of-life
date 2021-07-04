<?php


namespace App\Service\Cell;


use App\Domain\Model\CellInterface;

interface CellEvolveInterface
{
    public function evolveCell(CellInterface $cell, int $LiveNeighbors): CellInterface;
}