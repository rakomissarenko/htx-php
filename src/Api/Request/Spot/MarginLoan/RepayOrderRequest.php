<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class RepayOrderRequest extends AbstractRequest
{
    protected const PATH = '/v1/margin/orders/';
    private const PATH_AFTER = '/repay';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $orderId,
        private string $amount,
    ) {}

    public function getPath(): string
    {
        return self::PATH . $this->orderId . self::PATH_AFTER;
    }

    protected function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
        ValidateHelper::validateNotEmptyString($this->orderId, FieldHelper::FIELD_ORDER_ID_HYPHEN);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_AMOUNT          => $this->amount,
            FieldHelper::FIELD_ORDER_ID_HYPHEN => $this->orderId,
        ];
    }
}
