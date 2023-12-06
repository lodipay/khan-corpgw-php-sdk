<?php

namespace Lodipay\KhanCorpGwSDK\Exception;

use Lodipay\KhanCorpGwSDK\Dto\ResponseDTO;

class BadResultException extends \Exception
{
    public function __construct(public ResponseDTO $responseDTO)
    {
        parent::__construct("BadResultException: " . $responseDTO->message);
    }
}
