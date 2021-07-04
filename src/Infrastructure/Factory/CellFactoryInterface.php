<?php


namespace App\Infrastructure\Factory;


interface CellFactoryInterface
{
    public function createCell(string $cell = null);
}