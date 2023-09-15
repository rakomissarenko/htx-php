<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;

class CancelRequest extends AbstractRequest
{
    private const FIELD_ORDER_ID = 'order-id';
    private const FIELD_SYMBOL = 'symbol';

    protected const PATH = '/v1/order/orders/';
    private const PATH_AFTER = '/submitcancel';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $orderId,
        private string $symbol,
    ) {}

    public function getPath(): string
    {
        return self::PATH . $this->orderId . self::PATH_AFTER;
    }

    public function toArray(): array
    {
        return [
            self::FIELD_ORDER_ID => $this->orderId,
            self::FIELD_SYMBOL   => $this->symbol,
        ];
    }
}
