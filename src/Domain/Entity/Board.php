<?php


namespace App\Domain\Entity;


use App\Domain\Model\BoardInterface;
use App\Domain\Model\CellInterface;
use App\Infrastructure\Factory\CellFactoryInterface;
use App\Service\Cell\CellEvolveInterface;

class Board implements BoardInterface
{
    private int $boardSize;

    private array $cells;

    private CellFactoryInterface $cellFactory;

    private CellEvolveInterface $cellEvolve;

    public function __construct(int $boardSize, CellFactoryInterface $cellFactory, CellEvolveInterface $cellEvolve)
    {
        $this->boardSize = $boardSize;
        $this->cellFactory = $cellFactory;
        $this->cellEvolve = $cellEvolve;

        $this->init();
    }

    private function init(): void
    {
        for($i=0; $i<$this->getBoardSize(); $i++){
            for($j=0; $j<$this->getBoardSize(); $j++){
                $this->addCell($i, $j, true);
            }
        }
    }

    /**
     * @return int
     */
    public function getBoardSize(): int
    {
        return $this->boardSize;
    }

    /**
     * @param int $boardSize
     */
    public function setBoardSize(int $boardSize): void
    {
        $this->boardSize = $boardSize;
    }

    /**
     * @return array
     */
    public function getCells(): array
    {
        return $this->cells;
    }

    /**
     * @param int $x
     * @param int $y
     * @param bool $isDead
     * @return CellInterface
     */
    public function addCell(int $x, int $y, bool $isDead): void
    {
        /** @var CellInterface $cell */
        $cell = $this->cellFactory->createCell();
        $cell->setX($x)
            ->setY($y)
            ->setIsDead($isDead);

        $this->cells[$x][$y] = $cell;
    }

    /**
     * @param int $x
     * @param int $y
     * @param bool $isDead
     * @return CellInterface
     */
    public function setCell(int $x, int $y, bool $isDead): void
    {
        $this->cells[$x][$y]->setIsDead($isDead);
    }

    public function nextGeneration(): BoardInterface
    {
        $newBoard = clone $this;

        /** @var CellInterface $cell */
        foreach ($this->getCells() as $x => $row){
            foreach ($row as $y => $cell) {
                $newCell = $this->cellEvolve->evolveCell($cell, $this->getLiveCellNeighbors($cell));

                $newBoard->addCell($newCell->getX(), $newCell->getY(), $newCell->isDead());
            }
        }

        return $newBoard;
    }

    public function getLiveCellNeighbors(CellInterface $cell): int
    {
        $coordinatesArray = [
            [-1, -1],[-1, 0],[-1, 1],
            [0, -1],[0, 1],
            [1, -1],[1, 0],[1, 1]
        ];

        $cells = $this->getCells();
        $x = $cell->getX();
        $y = $cell->getY();

        $count = 0;
        foreach ($coordinatesArray as $coordinate) {
            if (isset($cells[$x + $coordinate[0]][$y + $coordinate[1]])
                && $cells[$x + $coordinate[0]][$y + $coordinate[1]]->isAlive()) {
                $count++;
            }
        }

        return $count;
    }

    public function __clone(): void
    {
        $this->cells = [];
    }


}