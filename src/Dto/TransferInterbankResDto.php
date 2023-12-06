<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

class TransferInterbankResDto extends ResponseDto
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
