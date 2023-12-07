<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Carbon\CarbonImmutable;
use Tsetsee\DTO\DTO\TseDTO;

class AccessTokenData extends TseDTO
{
    /**
     * Хэрэглэгчийн token
     * 
     * @var string
     */
    public string $token;

    /**
     * Баталгаат и-мэйл хаяг
     * 
     * @var string
     */
    public string $developer_email;

    /**
     * Хүчинтэй байх хугацаа
     * 
     * @var CarbonImmutable
     */
    public CarbonImmutable $expireDate;

    public function isAccessTokenActive(): bool
    {
        return CarbonImmutable::now()->lt($this->expireDate);
    }
}
