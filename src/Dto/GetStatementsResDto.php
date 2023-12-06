<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

class GetStatementsResDto extends ResponseDto
{
    /**
     * Дансны дугаар
     * 
     * @var string
     */
    public string $account;

    /**
     * Валют
     * 
     * @var string
     */
    public string $Currency;

    /**
     * Харилцагчийн нэр
     * 
     * @var string
     */
    public string $customerName;

    /**
     * Бүтээгдэхүүний нэр
     * 
     * @var string
     */
    public string $productName;

    /**
     * Салбар
     * 
     * @var string
     */
    public string $branch;

    /**
     * Салбарын нэр
     * 
     * @var string
     */
    public string $branchName;

    /**
     * Эхлэх огнооны байдлаарх дүн
     * 
     * @var float
     */
    public float $beginBalance;

    /**
     * Сүүлийн огнооны байдлаарх дүн
     * 
     * @var float
     */
    public float $endBalance;

    /**
     * Эхлэх огноо
     * 
     * @var string
     */
    public string $beginDate;

    /**
     * Сүүлийн огноо
     * 
     * @var string
     */
    public string $endDate;

    /**
     * Нийт
     * 
     * @var string
     */
    public string $total;

    /**
     * Шүүлтийн огнооны байдлаарх нийт илэрсэн гүйлгээний тоо
     * 
     * @var int
     */
    public int $count;

    /**
     * Орлогын дүн
     * 
     * @var float
     */
    public float $credit;

    /**
     * Зарлагын дүн
     * 
     * @var float
     */
    public float $debit;

    /**
     * Гүйлгээний дугаар
     * 
     * @var int
     */
    public int $record;

    /**
     * Шилжүүлэг хийсэн огноо
     * 
     * @var string
     */
    public string $tranDate;

    /**
     * Гүйлгээ хийгдсэн огноо
     * 
     * @var string
     */
    public string $postDate;

    /**
     * Цаг:hhmmssss-> hh:цаг, mm:минут, ssss:секунд доль
     * 
     * @var string
     */
    public string $time;

    /**
     * Теллер
     * 
     * @var string
     */
    public string $teller;

    /**
     * Дансанд санхүүгийн бүртгэл үүссэн дугаар
     * 
     * @var string
     */
    public string $journal;

    /**
     * Гүйлгээний дүн
     * 
     * @var float
     */
    public float $amount;

    /**
     * Үлдэгдэл
     * 
     * @var string
     */
    public string $balance;

    /**
     * Гүйлгээний утга
     * 
     * @var string
     */
    public string $description;

    /**
     * Харьцсан дансны нэр /Зөвхөн банк доторх гүйлгээ дээр гарна. /
     * 
     * @var string
     */
    public string $relatedAccount;
}
