<?php


namespace App\Domain\Model;


interface BoardInterface
{
    public function getCells(): array;

    public function addCell(int $x, int $y, bool $isDead): void;

    public function setCell(int $x, int $y, bool $isDead): void;

    public function setBoardSize(int $size): void;

    public function getBoardSize(): int;

    public function nextGeneration(): BoardInterface;

    public function getLiveCellNeighbors(CellInterface $cell): int;
}