<?php

declare(strict_types=1);

namespace App;

use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

final class LoggerFactory
{
    public static function create(): LoggerInterface
    {
        $logger = new Logger('cli-app');
        $logger->pushHandler(new ErrorLogHandler());
        return $logger;
    }
}
