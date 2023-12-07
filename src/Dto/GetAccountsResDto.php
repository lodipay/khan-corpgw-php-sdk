<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Tsetsee\DTO\DTO\TseDTO;

class GetAccountsResDto extends TseDTO
{

    /**
     * Дансны дугаар
     * 
     * @var string
     */
    public string $number;

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
     * Төлөв
     * 
     * @var string
     */
    public string $status;

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
