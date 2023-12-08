<?php

use Carbon\Carbon;
use Lodipay\KhanCorpGwSDK\Dto\AccessTokenData;
use Lodipay\KhanCorpGwSDK\KhanCorpGwAPI;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env.example');

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv->load(__DIR__ . '/../.env');
}

function getClientService(array $options = []): KhanCorpGwAPI
{
    $logger = null;

    if ('true' === $_ENV['DEBUG']) {
        $logger = new Logger('test');
        $logger->pushHandler(new StreamHandler(STDOUT, Logger::DEBUG));
    }

    return new KhanCorpGwAPI(
        'user1',
        '123',
        options: array_replace_recursive([
            'logger' => $logger,
        ], $options),
    );
}


function getMockClientAPI(array $options = []): KhanCorpGwAPI
{
    $logger = null;

    if ('true' === $_ENV['DEBUG']) {
        $logger = new Logger('test');
        $logger->pushHandler(new StreamHandler(STDOUT, Logger::DEBUG));
    }

    $mock = Mockery::mock(KhanCorpGwAPI::class)->makePartial();

    $mock->__construct(
        username: $_ENV['KHAN_CORPGW_ACCOUNT_USERNAME'],
        password: $_ENV['KHAN_CORPGW_ACCOUNT_PASSWORD'],
        options: array_replace_recursive([
            'logger' => $logger,
        ], $options),
    );

    $mock->shouldReceive('getAccessTokenData')
        ->andReturn(AccessTokenData::from([
            'token' => 'epF4ULQN6BeGZGcWgINCTnaEjz3v',
            'developer_email' => 'chbaagii96@gmail.com',
            'expireDate' => Carbon::now()->add($_ENV['KHAN_CORPGW_TOKEN_TTL'] ?? 1800, 'second')->format('c'),
        ]));


    return $mock;
}
