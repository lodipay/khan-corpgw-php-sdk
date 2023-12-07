<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lodipay\KhanCorpGwSDK\Dto\TransferDomesticReqDto;
use Lodipay\KhanCorpGwSDK\KhanCorpGwService;

function getTransferInterbankMockHandler()
{
    return new MockHandler([
        new Response(200, [], <<<JSON
            {
                "uuid": "f1298sf2338921rj712y3",
                "journalNo": "823894902349",
                "transferid": "df8dsf131dnfu984uehu31",
                "systemDate": "2023-11-05"
            }
        JSON),
    ]);
}

it('should transfer fund domestically to user successfully', function () {
    /** @var KhanCorpGwService $service */
    $service = test()->getMockClientService([
        'handler' => HandlerStack::create(getTransferInterbankMockHandler()),
    ]);

    $response = $service->transferDomestic(
        TransferDomesticReqDto::from([
            'fromAccount' => '506525****',
            'toAccount' => '506535****',
            'amount' => '1500',
            'description' => 'test ymaa',
            'currency' => 'MNT',
            'transferid' => '832487231',
            'loginName' => '9441****',
            'tranPassword' => 'pass',
            'toCurrency' => 'MNT',
            'toBank' => 'XAC'
        ]),
    );
    expect($response)->transferid->toBeString();
});
