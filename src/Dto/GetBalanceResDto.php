<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

class GetBalanceResDto extends ResponseDto
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
