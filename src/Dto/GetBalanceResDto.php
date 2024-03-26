<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Lodipay\DTO\DTO\TseDTO;

class GetBalanceResDto extends TseDTO
{
    /**
     * Дансны төрөл.
     */
    public string $type;

    /**
     * Дансны валют
     */
    public string $currency;

    /**
     * Үлдэгдэл.
     */
    public float $balance;

    /**
     * Дансны нэр
     */
    public string $name;

    /**
     * Барилт хийсэн дүн.
     */
    public string $holdBalance;

    /**
     * Боломжит үлдэгдэл.
     */
    public string $avaliableBalance;
}
