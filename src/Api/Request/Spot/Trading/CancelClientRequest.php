<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;

class CancelClientRequest extends AbstractRequest
{
    protected const PATH = '/v1/order/orders/submitCancelClientOrder';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(private string $clientOrderId)
    {}

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_CLIENT_ORDER_ID_HYPHEN => $this->clientOrderId,
        ];
    }
}
