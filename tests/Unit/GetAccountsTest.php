<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lodipay\KhanCorpGwSDK\KhanCorpGwAPI;

function getAccountsMockHandler()
{
    return new MockHandler([
        new Response(200, [], <<<JSON
            [
                {
                    "number": "506525****",
                    "type": "INDIVIDUAL",
                    "currency": "MNT",
                    "status": "ACTIVE",
                    "balance": 10700.00,
                    "name": "Бадамгарав",
                    "holdBalance": "0",
                    "avaliableBalance": "10700"
                },
                {
                    "number": "506525****",
                    "type": "SAVING",
                    "currency": "MNT",
                    "status": "ACTIVE",
                    "balance": 0.00,
                    "name": "Бадамгарав",
                    "holdBalance": "0",
                    "avaliableBalance": "0"
                }
            ]
        JSON),
    ]);
}

it('should return bank accounts of user', function () {
    /** @var KhanCorpGwAPI $service */
    $service = test()->getMockClientAPI([
        'handler' => HandlerStack::create(getAccountsMockHandler()),
    ]);

    $response = $service->getAccounts();
    expect($response)->toBeArray();
});
