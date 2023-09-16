<?php

namespace Feralonso\Htx\Api\Request\Spot\Market;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;

class TickerRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/market/detail/merged';

    public function __construct(private string $symbol) {}

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SYMBOL => $this->symbol,
        ];
    }
}
