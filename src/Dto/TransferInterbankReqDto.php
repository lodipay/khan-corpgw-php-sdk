<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Lodipay\DTO\DTO\TseDTO;

class TransferInterbankReqDto extends TseDTO
{
    /**
     * Гүйлгээ хийх дансны дугаар
     * 
     * @var string
     */
    public string $fromAccount;

    /**
     * Хүлээн авах дансны дугаар
     * 
     * @var string
     */
    public string $toAccount;

    /**
     * Гүйлгээний дүн
     * 
     * @var string
     */
    public string $amount;

    /**
     * Гүйлгэний утга
     * 
     * @var string
     */
    public string $description;

    /**
     * валют
     * 
     * @var string
     */
    public string $currency;

    /**
     * Гүйлгээний дугаар
     * 
     * @var string
     */
    public string $transferid;

    /**
     * Интернэт банк руу нэвтрэх эрх
     * 
     * @var string
     */
    public string $loginName;

    /**
     * Корпорэйт портал-р үүсгэсэн гүйлгээний нууц
     * 
     * @var string
     */
    public string $tranPassword;

    /**
     * Хүлээн авах валют зөвхөн MNT байна
     * 
     * @var string
     */
    public string $toCurrency;

    /**
     * Хүлээн авах банкны код
     * 
     * @var string
     */
    public string $toBank;
}
