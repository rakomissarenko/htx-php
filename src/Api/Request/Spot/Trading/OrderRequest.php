<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;

class OrderRequest extends AbstractRequest
{
    private const FIELD_ORDER_ID = 'order-id';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/orders/';

    public function __construct(private string $orderId) {}

    public function getPath(): string
    {
        return self::PATH . $this->orderId;
    }

    public function toArray(): array
    {
        return [
            self::FIELD_ORDER_ID => $this->orderId,
        ];
    }
}
