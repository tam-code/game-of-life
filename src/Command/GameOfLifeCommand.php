<?php


namespace App\Command;


use App\Domain\Model\BoardInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class GameOfLifeCommand extends Command
{
    protected static $defaultName = "game-of-life";

    protected static $defaultDescription = "Start Game of Life.";

    private BoardInterface $board;

    public function __construct(BoardInterface $board)
    {
        $this->board = $board;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $board = $this->initBoard();

        $section = $output->section();
        $table = new Table($section);
        $table->addRows($board->getCells());
        $table->render();

        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion('Generate a new generation? (yes): ', true);

        while($helper->ask($input, $output, $question)) {
            $board = $board->nextGeneration();
            $table->setRows($board->getCells());
            $table->render();

            $helper = $this->getHelper('question');
            $question = new ConfirmationQuestion('Generate a new generation? (yes): ', true);
        }

        return Command::SUCCESS;
    }

    private function initBoard(){
        $board = $this->board;

        $board->setCell(10,12,false);
        $board->setCell(11,13,false);
        $board->setCell(12,11,false);
        $board->setCell(12,12,false);
        $board->setCell(12,13,false);

        return $board;
    }
}