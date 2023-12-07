<?php

namespace Lodipay\KhanCorpGwSDK;

use Carbon\CarbonImmutable;
use Lodipay\KhanCorpGwSDK\Dto\AccessTokenData;
use Lodipay\KhanCorpGwSDK\Dto\GetAccountsResDto;
use Lodipay\KhanCorpGwSDK\Dto\GetBalanceResDto;
use Lodipay\KhanCorpGwSDK\Dto\GetStatementsResDto;
use Lodipay\KhanCorpGwSDK\Dto\TransferDomesticReqDto;
use Lodipay\KhanCorpGwSDK\Dto\TransferDomesticResDto;
use Lodipay\KhanCorpGwSDK\Dto\TransferInterbankReqDto;
use Lodipay\KhanCorpGwSDK\Dto\TransferInterbankResDto;
use Tsetsee\TseGuzzle\TseGuzzle;

class KhanCorpGwService extends TseGuzzle
{

    private ?AccessTokenData $accessTokenData = null;

    public function __construct(private $username, private $password, array $options = [])
    {
        parent::__construct(array_replace_recursive([
            'base_uri' => 'https://doob.world:6442/v1/',
            'oauth2' => 'bearer',
        ], $options));
    }


    /**
     * Oauth access token override function.
     * 
     * @return string
     */
    protected function getAccessToken(): string
    {
        if (!$this->accessTokenData || !$this->accessTokenData->isAccessTokenActive()) {
            $this->accessTokenData = $this->getAccessTokenData();
        }
        return $this->accessTokenData->token;
    }

    /**
     * Get access token from API
     * 
     * 
     * @return AccessTokenData
     */
    public function getAccessTokenData(): AccessTokenData
    {
        $accessTokenData =  AccessTokenData::from($this->callAPI('POST', 'auth/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'username' => $this->username,
                'password' => $this->password,
            ],
            'query' => [
                'grant_type' => 'client_credentials'
            ]
        ]));
        $accessTokenData->expireDate = CarbonImmutable::now()->addMinutes($_ENV['KHAN_CORPGW_TOKEN_TTL'] ?? 1800);

        return $accessTokenData;
    }

    /**
     * Get bank accounts
     * 
     * @return array<GetAccountsResDto>
     */
    public function getAccounts(): array
    {
        return GetAccountsResDto::fromArray($this->callAPI('GET', 'accounts', [
            'oauth2' => true
        ]));
    }

    /**
     * Get balance of an account
     * 
     * @param string $accountNo
     * 
     * @return GetBalanceResDto
     */
    public function getBalance(string $accountNo): GetBalanceResDto
    {
        return GetBalanceResDto::from($this->callAPI('GET', 'accounts/' . $accountNo . 'balance', [
            'oauth2' => true
        ]));
    }

    /**
     * Get statements
     * 
     * @param string $accountNo
     * @param string $beginDate
     * @param string $endDate
     * 
     * @return array<GetStatementsResDto>
     */
    public function getStatements(string $accountNo, ?string $beginDate = null, ?string $endDate = null): array
    {
        return GetStatementsResDto::fromArray($this->callAPI(
            'GET',
            'statements/' . $accountNo,
            [
                'query' => [
                    'beginDate' => $beginDate,
                    'endDate' => $endDate
                ],
                'oauth2' => true,
            ]
        ));
    }

    /**
     * Domestic transfer
     * 
     * @param TransferDomesticReqDto $dto
     * 
     * @return TransferDomesticResDto
     */
    public function transferDomestic(TransferDomesticReqDto $dto): TransferDomesticResDto
    {
        return TransferDomesticResDto::from($this->callAPI('POST', 'transfer/domestic', [
            'json' => $dto->toArray(),
            'oauth2' => true,
        ]));
    }

    /**
     * Interbank transfer
     * 
     * @param TransferInterbankReqDto $dto
     * 
     * @return TransferInterbankResDto
     */
    public function transferInterbank(TransferInterbankReqDto $dto): TransferInterbankResDto
    {
        return TransferInterbankResDto::from($this->callAPI('POST', 'transfer/interbank', [
            'json' => $dto->toArray(),
            'oauth2' => true,
        ]));
    }

    /**
     * Call API
     * 
     * @param string $method
     * @param string $uri
     * @param array<string, mixed> $options
     * 
     * @return mixed
     */
    private function callAPI(string $method, string $uri, array $options = []): mixed
    {
        $response = $this->client->request($method, $uri, $options);
        return json_decode((string) $response->getBody(), true);
    }
}
