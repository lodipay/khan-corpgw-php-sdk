<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Lodipay\DTO\DTO\TseDTO;

class TransferDomesticResDto extends TseDTO
{
    /**
     * Гүйлгээний код
     * 
     * @var string
     */
    public string $uuid;

    /**
     * Журнал дугаар
     * 
     * @var string
     */
    public string $journalNo;

    /**
     * Гүйлгээний дугаар
     * 
     * @var string
     */
    public string $transferid;

    /**
     * Гүйлгээ хийгдсэн огноо
     * 
     * @var string
     */
    public string $systemDate;
}
