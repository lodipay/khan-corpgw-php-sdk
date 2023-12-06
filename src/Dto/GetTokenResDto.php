<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

class GetTokenResDto extends ResponseDto
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
}
