<?php

declare(strict_types=1);

/*
 * Copyright (c) Adrian Jeledintan
 */

namespace Monorepo\One\Command;

use Drjele\Symfony\Console\Command\AbstractCommand;
use Monorepo\Library\One\Service\DebugService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'monorepo:one:debug', description: 'Debug')]
class DebugCommand extends AbstractCommand
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->writeln(DebugService::class);

        return self::SUCCESS;
    }
}
