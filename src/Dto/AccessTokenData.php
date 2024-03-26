<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Carbon\CarbonImmutable;
use Lodipay\DTO\DTO\TseDTO;

class AccessTokenData extends TseDTO
{
    /**
     * Хэрэглэгчийн token.
     */
    public string $token;

    /**
     * Баталгаат и-мэйл хаяг.
     */
    public string $developer_email;

    /**
     * Хүчинтэй байх хугацаа.
     */
    public CarbonImmutable $expireDate;

    public function isAccessTokenActive(): bool
    {
        return CarbonImmutable::now()->lt($this->expireDate);
    }
}
