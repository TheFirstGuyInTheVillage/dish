<?php

declare(strict_types = 1);

namespace App\Entrypoints\Command;

use App\Application\DishBuilding\HandlerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

#[AsCommand(name: 'app:dish:build')]
class DishBuilderCommand extends Command
{
    public const COMMAND_NAME               = 'app:dish:build';
    private const INGREDIENT_TYPES_ORDER_ARGUMENT = 'typesOrder';

    protected static $defaultName = self::COMMAND_NAME;

    public function __construct(
        private readonly HandlerInterface $handler,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument(
            name: self::INGREDIENT_TYPES_ORDER_ARGUMENT,
            mode: InputArgument::REQUIRED,
            description: 'Порядок кодов ингредиентов',
        );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $result = $this->handler->handle($input->getArgument(self::INGREDIENT_TYPES_ORDER_ARGUMENT));
            $output->writeln($result);
            return Command::SUCCESS;
        } catch (Throwable $exception) {
            $output->writeln('Unable to build dish. Error: ' . $exception->getMessage());
            return Command::FAILURE;
        }
    }
}