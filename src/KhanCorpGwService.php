<?php

namespace Lodipay\KhanCorpGwSDK;

use Lodipay\KhanCorpGwSDK\Dto\GetAccountsResDto;
use Lodipay\KhanCorpGwSDK\Dto\GetBalanceResDto;
use Lodipay\KhanCorpGwSDK\Dto\GetStatementsResDto;
use Lodipay\KhanCorpGwSDK\Dto\GetTokenReqDto;
use Lodipay\KhanCorpGwSDK\Dto\GetTokenResDto;
use Lodipay\KhanCorpGwSDK\Dto\TransferDomesticReqDto;
use Lodipay\KhanCorpGwSDK\Dto\TransferDomesticResDto;
use Lodipay\KhanCorpGwSDK\Dto\TransferInterbankReqDto;
use Lodipay\KhanCorpGwSDK\Dto\TransferInterbankResDto;
use Psr\Http\Message\ResponseInterface;
use Tsetsee\TseGuzzle\TseGuzzle;

class KhanCorpGwService extends TseGuzzle
{
    public function __construct(array $options = [])
    {
        parent::__construct(array_replace_recursive([
            'base_uri' => 'https://doob.world:6442/v1/',
            'oauth2' => 'bearer'
        ], $options));
    }

    public function getAccessToken(): string
    {
        return '123123km12k312';
    }

    /**
     * Get access token
     * 
     * @param GetTokenReqDto $dto
     * @param array<string, mixed> $options
     * 
     * @return GetTokenResDto
     */
    public function getToken(GetTokenReqDto $dto, array $options = []): GetTokenResDto
    {
        return GetTokenResDto::fromResponse($this->callAPI('POST', 'auth/token', array_replace_recursive([
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => $dto->toArray()
        ], $options)));
    }

    /**
     * Get bank accounts
     * @param array<string, mixed> $options
     * 
     * @return array<GetAccountsResDto>
     */
    public function getAccounts(array $options = []): array
    {
        return GetAccountsResDto::fromResponseArray($this->callAPI('GET', 'accounts', $options));
    }

    /**
     * Get balance of an account
     * 
     * @param string $accountNo
     * @param array<string, mixed> $options
     * 
     * @return GetBalanceResDto
     */
    public function getBalance(string $accountNo, array $options = []): GetBalanceResDto
    {
        return GetBalanceResDto::fromResponse($this->callAPI('GET', 'accounts/' . $accountNo . 'balance', $options));
    }

    /**
     * Get statements
     * 
     * @param string $accountNo
     * @param string $beginDate
     * @param string $endDate
     * @param array<string, mixed> $options
     * 
     * @return array<GetStatementsResDto>
     */
    public function getStatements(string $accountNo, ?string $beginDate = null, ?string $endDate = null, array $options = []): array
    {
        return GetStatementsResDto::fromResponseArray($this->callAPI('GET', 'statements/' . $accountNo, array_replace_recursive([
            'query' => [
                'beginDate' => $beginDate,
                'endDate' => $endDate
            ]
        ], $options)));
    }

    /**
     * Domestic transfer
     * 
     * @param TransferDomesticReqDto $dto
     * @param array<string, mixed> $options
     * 
     * @return TransferDomesticResDto
     */
    public function transferDomestic(TransferDomesticReqDto $dto, array $options = []): TransferDomesticResDto
    {
        return TransferDomesticResDto::fromResponse($this->callAPI('POST', 'transfer/domestic', array_replace_recursive([
            'json' => $dto->toArray()
        ], $options)));
    }

    /**
     * Interbank transfer
     * 
     * @param TransferInterbankReqDto $dto
     * @param array<string, mixed> $options
     * 
     * @return TransferInterbankResDto
     */
    public function transferInterbank(TransferInterbankReqDto $dto, array $options = []): TransferInterbankResDto
    {
        return TransferInterbankResDto::fromResponse($this->callAPI('POST', 'transfer/interbank', array_replace_recursive([
            'json' => $dto->toArray()
        ], $options)));
    }

    /**
     * Call API
     * 
     * @param string $method
     * @param string $uri
     * @param array<string, mixed> $options
     * 
     * @return ResponseInterface
     */
    private function callAPI(string $method, string $uri, array $options = []): ResponseInterface
    {
        return $this->client->request($method, $uri, $options);
    }
}
