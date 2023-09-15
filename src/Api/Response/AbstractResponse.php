<?php

namespace Feralonso\Htx\Api\Response;

use Feralonso\Htx\Exceptions\HtxValidateException;
use JsonException;

abstract class AbstractResponse implements ResponseInterface
{
    protected const FIELD_DATA = 'data';

    private array $responseArray = [];

    /**
     * @throws HtxValidateException
     */
    public function __construct(private string $response)
    {
        try {
            $this->responseArray = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            throw new HtxValidateException('Could not parse payment response', HtxValidateException::ERROR_INPUT_VALUE_INVALID);
        }
    }

    public function getResponse(): string
    {
        return $this->response;
    }

    public function toArray(): array
    {
        return $this->responseArray;
    }
}
