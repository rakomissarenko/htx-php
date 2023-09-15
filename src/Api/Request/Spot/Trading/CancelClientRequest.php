<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;

class CancelClientRequest extends AbstractRequest
{
    private const FIELD_CLIENT_ORDER = 'client-order-id';

    protected const PATH = '/v1/order/orders/submitCancelClientOrder';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(private string $clientOrderId)
    {}

    public function toArray(): array
    {
        return [
            self::FIELD_CLIENT_ORDER => $this->clientOrderId,
        ];
    }
}
