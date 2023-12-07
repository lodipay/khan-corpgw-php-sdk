<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Tsetsee\DTO\DTO\TseDTO;

class GetBalanceResDto extends TseDTO
{
    /**
     * Дансны төрөл
     * 
     * @var string
     */
    public string $type;

    /**
     * Дансны валют
     * 
     * @var string
     */
    public string $currency;

    /**
     * Үлдэгдэл
     * 
     * @var float
     */
    public float $balance;

    /**
     * Дансны нэр
     * 
     * @var string
     */
    public string $name;

    /**
     * Барилт хийсэн дүн
     * 
     * @var string
     */
    public string $holdBalance;

    /**
     * Боломжит үлдэгдэл
     * 
     * @var string
     */
    public string $avaliableBalance;
}
