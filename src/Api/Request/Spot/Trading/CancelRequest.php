<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;

class CancelRequest extends AbstractRequest
{
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

    public function validate(): void
    {
        ValidateHelper::validateNotEmptyString($this->orderId, FieldHelper::FIELD_ORDER_ID_HYPHEN);
        ValidateHelper::validateNotEmptyString($this->symbol, FieldHelper::FIELD_SYMBOL);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_ORDER_ID_HYPHEN => $this->orderId,
            FieldHelper::FIELD_SYMBOL          => $this->symbol,
        ];
    }
}
