<?php


namespace App\Infrastructure\Factory;


use App\Domain\Entity\Cell;

class CellFactory implements CellFactoryInterface
{

    public function createCell(string $cell = null)
    {
        return new Cell();
    }
}