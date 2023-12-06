<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lodipay\KhanCorpGwSDK\KhanCorpGwService;

function getStatementsMockHandler()
{
    return new MockHandler([
        new Response(200, [], <<<JSON
            [
                {
                "account": "506525****",
                "Currency": "MNT",
                "customerName": "Baagii",
                "productName": "FEE",
                "branch": "B_13",
                "branchName": "Blue sky",
                "beginBalance": 12500.00,
                "endBalance": 12000.00,
                "beginDate": "2023-11-05",
                "endDate": "2023-11-06",
                "total": "500",
                "count": 1,
                "credit": 0.00,
                "debit": 500.00,
                "record": 293423874,
                "tranDate": "2023-11-05",
                "postDate": "2023-11-05",
                "time": "11020234",
                "teller": "teller1",
                "journal": "294923841",
                "amount": 500.00,
                "balance": "12000",
                "description": "Test ymaa",
                "relatedAccount": "506535****"
            }]
        JSON),
    ]);
}

it('should return statements of user account', function () {
    /** @var KhanCorpGwService $service */
    $service = test()->getMockClientService([
        'handler' => HandlerStack::create(getStatementsMockHandler()),
    ]);

    $response = $service->getStatements('506525****', null, null, [
        'headers' => [
            'Authorization' => 'Bearer token',
        ],
    ]);
    var_dump('LOG: ', json_encode($response));
    expect($response)->toBeArray();
});
