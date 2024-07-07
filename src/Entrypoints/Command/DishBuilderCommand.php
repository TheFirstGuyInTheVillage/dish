<?php

declare(strict_types = 1);

namespace App\Entrypoints\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DishBuilderCommand extends Command
{
    public const COMMAND_NAME = 'app:dish:build';

    protected static $defaultName = self::COMMAND_NAME;

    public function execute(InputInterface $input, OutputInterface $output): void
    {
        dd('Building will be here soon');
    }
}