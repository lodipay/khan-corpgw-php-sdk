<?php

use Lodipay\KhanCorpGwSDK\KhanCorpGwService;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

function getMockClientService(array $options = []): KhanCorpGwService
{
    $logger = null;

    if ('true' === $_ENV['DEBUG']) {
        $logger = new Logger('test');
        $logger->pushHandler(new StreamHandler(STDOUT, Logger::DEBUG));
    }

    $mock = Mockery::mock(KhanCorpGwService::class)->makePartial();

    $mock->__construct(
        options: array_replace_recursive([
            'logger' => $logger,
        ], $options),
    );

    return $mock;
}
