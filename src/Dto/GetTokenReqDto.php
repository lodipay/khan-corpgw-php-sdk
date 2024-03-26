<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Lodipay\DTO\DTO\TseDTO;

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
