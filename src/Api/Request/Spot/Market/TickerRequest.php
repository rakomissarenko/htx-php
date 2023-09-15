<?php

namespace Feralonso\Htx\Api\Request\Spot\Market;

use Feralonso\Htx\Api\Request\AbstractRequest;

class TickerRequest extends AbstractRequest
{
    private const FIELD_SYMBOL = 'symbol';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/market/detail/merged';

    public function __construct(private string $symbol) {}

    public function toArray(): array
    {
        return [
            self::FIELD_SYMBOL => $this->symbol,
        ];
    }
}
