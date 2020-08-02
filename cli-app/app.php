<?php

declare(strict_types=1);

use App\LogDateTimeCommand;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

require_once __DIR__ . '/vendor/autoload.php';

$serviceContainer = serviceContainer();

$application = new Application();
$application->setCatchExceptions(false);
$application->addCommands([
    $serviceContainer->get(LogDateTimeCommand::class)
]);

$application->run();

/**
 * @throws Exception
 */
function serviceContainer(): ContainerInterface
{
    $containerBuilder = new ContainerBuilder();
    $loader = new PhpFileLoader($containerBuilder, new FileLocator(__DIR__));
    $loader->load('./di.php');
    $containerBuilder->compile();
    return $containerBuilder;
}