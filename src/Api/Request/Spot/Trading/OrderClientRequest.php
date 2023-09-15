<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;

class OrderClientRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/orders/getClientOrder';

    public function __construct(private string $clientOrderId) {}

    public function toArray(): array
    {
        return [
            self::FIELD_CLIENT_ORDER_ID => $this->clientOrderId,
        ];
    }
}
