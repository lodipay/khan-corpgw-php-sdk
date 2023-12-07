<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lodipay\KhanCorpGwSDK\KhanCorpGwService;

function getMockAccessTokenHandler()
{
    return new MockHandler([
        new Response(200, [], <<<JSON
            {
                "token": "epF4ULQN6BeGZGcWgINCTnaEjz3v",
                "developer_email": "chbaagii96@gmail.com"
            }
        JSON),
    ]);
}

it('should return a token from API', function () {
    /** @var KhanCorpGwService $service */
    $service = test()->getMockClientService([
        'handler' => HandlerStack::create(getMockAccessTokenHandler()),
    ]);

    $response = $service->getAccessTokenData();

    expect($response)
        ->token->toBe('epF4ULQN6BeGZGcWgINCTnaEjz3v')
        ->developer_email->toBe('chbaagii96@gmail.com');
});
