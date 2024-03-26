<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Lodipay\DTO\DTO\TseDTO;

class GetAccountsResDto extends TseDTO
{
    /**
     * Дансны дугаар
     */
    public string $number;

    /**
     * Дансны төрөл.
     */
    public string $type;

    /**
     * Дансны валют
     */
    public string $currency;

    /**
     * Төлөв.
     */
    public string $status;

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
