<?php

declare(strict_types=1);

use App\LogDateTimeCommand;
use App\LoggerFactory;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function(ContainerConfigurator $configurator) {
    $services = $configurator->services();
    $services->set(LoggerInterface::class, LoggerInterface::class)
        ->factory([LoggerFactory::class, 'create']);

    $services->set(LogDateTimeCommand::class, LogDateTimeCommand::class)->autowire()->public();
};
