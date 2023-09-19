<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;

class OrderRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/orders/';

    public function __construct(private string $orderId) {}

    public function getPath(): string
    {
        return self::PATH . $this->orderId;
    }

    public function validate(): void
    {
        ValidateHelper::validateNotEmptyString($this->orderId, FieldHelper::FIELD_ORDER_ID_HYPHEN);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_ORDER_ID_HYPHEN => $this->orderId,
        ];
    }
}
