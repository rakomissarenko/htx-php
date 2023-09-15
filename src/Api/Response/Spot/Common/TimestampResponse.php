<?php

namespace Feralonso\Htx\Api\Response\Spot\Common;

use Feralonso\Htx\Api\Response\AbstractResponse;

class TimestampResponse extends AbstractResponse
{
    private ?string $timestamp = null;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();
        if (!empty($responseArray[self::FIELD_DATA]) && is_scalar($responseArray[self::FIELD_DATA])) {
            $this->timestamp = (string) $responseArray[self::FIELD_DATA];
        }
    }

    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }
}
