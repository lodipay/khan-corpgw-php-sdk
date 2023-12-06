<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lodipay\KhanCorpGwSDK\KhanCorpGwService;
use GuzzleHttp\Exception\RequestException;
use Lodipay\KhanCorpGwSDK\Dto\GetTokenReqDto;

function getTokenMockHandler()
{
    return new MockHandler([
        new Response(200, [], <<<JSON
            {
                "token": "epF4ULQN6BeGZGcWgINCTnaEjz3v",
                "developer_email": "user@gmail.com"
            }
        JSON),
    ]);
}

it('should return a token from API', function () {
    /** @var KhanCorpGwService $service */
    $service = test()->getMockClientService([
        'handler' => HandlerStack::create(getTokenMockHandler()),
    ]);

    $response = $service->getToken(GetTokenReqDto::from([
        'username' => 'user@gmail.com',
        'password' => '123',
    ]));

    expect($response)
        ->token->toBe('epF4ULQN6BeGZGcWgINCTnaEjz3v')
        ->developer_email->toBe('user@gmail.com');
});

it('should throw error if username and password are incorrect', function () {
    /** @var KhanCorpGwService $service */
    $service = test()->getMockClientService([
        'handler' => HandlerStack::create(),
    ]);

    $response = $service->getToken(GetTokenReqDto::from([
        'username' => 'baagii',
        'password' => '123',
    ]));

    expect($response)
        ->code->toBe('InvalidClientIdentifier');
})->throws(RequestException::class);
