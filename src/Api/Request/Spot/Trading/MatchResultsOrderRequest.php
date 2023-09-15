<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;

class MatchResultsOrderRequest extends AbstractRequest
{
    private const FIELD_ORDER_ID = 'order-id';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/orders/';
    private const PATH_AFTER = '/matchresults';

    public function __construct(private string $orderId) {}

    public function getPath(): string
    {
        return self::PATH . $this->orderId . self::PATH_AFTER;
    }

    public function toArray(): array
    {
        return [
            self::FIELD_ORDER_ID => $this->orderId,
        ];
    }
}
