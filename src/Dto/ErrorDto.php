<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Tsetsee\DTO\DTO\TseDTO;

class ErrorDto extends TseDTO
{
    public string $value;
    public string $msg;
    public string $param;
    public string $location;
}
