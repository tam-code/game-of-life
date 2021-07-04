<?php


namespace App\Domain\Model;


interface CellInterface
{
    public function getX(): int;

    public function setX(int $x): CellInterface;

    public function getY(): int;

    public function setY(int $y): CellInterface;

    public function isDead(): bool;

    public function setIsDead(bool $isDead): CellInterface;

    public function isAlive(): bool;
}