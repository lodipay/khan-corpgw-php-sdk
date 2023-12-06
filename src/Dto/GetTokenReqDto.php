<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Tsetsee\DTO\DTO\TseDTO;

class GetTokenReqDto extends TseDTO
{
    /**
     * Хэрэглэгчийн нэр
     * 
     * @var string
     */
    public string $username;

    /**
     * Хэрэглэгчийн нууц үг
     * 
     * @var string
     */
    public string $password;
}
