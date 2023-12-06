<?php

namespace Lodipay\KhanCorpGwSDK\Dto;

use Psr\Http\Message\ResponseInterface;
use Tsetsee\DTO\DTO\TseDTO;

class ResponseDto extends TseDTO
{
    public bool $success;
    public ?string $message = null;

    /**
     * @var array<ErrorDto>
     */
    public array $errors = [];

    public static function fromResponse(ResponseInterface $response): static
    {
        return static::from(json_decode($response->getBody(), true));
    }

    public static function fromResponseArray(ResponseInterface $response): array
    {
        return static::fromArray(json_decode($response->getBody(), true));
    }
}
