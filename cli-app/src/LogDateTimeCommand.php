<?php

declare(strict_types=1);

namespace App;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class LogDateTimeCommand extends Command
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface  $logger, string $name = null)
    {
        parent::__construct('app:log-time');
        $this->logger = $logger;
    }

    protected function configure()
    {
        $this
            ->setDescription('Log date and time')
            ->setHelp('This command allows you to log date and time.')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->logger->info((new \DateTimeImmutable('now', new \DateTimeZone('UTC')))->format('Y-m-d H:i:s'));
        return 0;
    }
}
