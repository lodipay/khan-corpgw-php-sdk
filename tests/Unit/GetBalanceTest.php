<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lodipay\KhanCorpGwSDK\KhanCorpGwAPI;

function getBalanceMockHandler()
{
    return new MockHandler([
        new Response(200, [], <<<JSON
            {
                "type": "INDIVIDUAL",
                "currency": "MNT",
                "balance": 10700.00,
                "name": "Бадамгарав",
                "holdBalance": "0",
                "avaliableBalance": "10700"
            }
        JSON),
    ]);
}

it('should return balance of user account', function () {
    /** @var KhanCorpGwAPI $service */
    $service = test()->getMockClientAPI([
        'handler' => HandlerStack::create(getBalanceMockHandler()),
    ]);

    $response = $service->getBalance('506525****');
    expect($response)->toBeObject();
});
