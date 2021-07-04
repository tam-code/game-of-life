<?php


namespace App\Domain\Entity;


use App\Domain\Model\CellInterface;

class Cell implements CellInterface
{
    private int $x;

    private int $y;

    private bool $isDead;

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX(int $x): CellInterface
    {
        $this->x = $x;

        return $this;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY(int $y): CellInterface
    {
        $this->y = $y;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDead(): bool
    {
        return $this->isDead;
    }

    /**
     * @param bool $isDead
     */
    public function setIsDead(bool $isDead): CellInterface
    {
        $this->isDead = $isDead;

        return $this;
    }

    public function isAlive(): bool
    {
        return $this->isDead == false;
    }

    public function __toString(): string
    {
        return $this->isAlive() ? "*" : " ";
    }
}