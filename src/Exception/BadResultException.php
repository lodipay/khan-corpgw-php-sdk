<?php

namespace Lodipay\KhanCorpGwSDK\Exception;

class BadResultException extends \Exception
{
    public function __construct(public string $message)
    {
        parent::__construct($message);
    }
}
