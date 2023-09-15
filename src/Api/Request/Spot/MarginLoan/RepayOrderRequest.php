<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class RepayOrderRequest extends AbstractRequest
{
    private const FIELD_AMOUNT = 'amount';
    private const FIELD_ORDER_ID = 'order-id';

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
        $this->validateNumeric($this->amount, self::FIELD_AMOUNT);
    }

    public function toArray(): array
    {
        return [
            self::FIELD_AMOUNT   => $this->amount,
            self::FIELD_ORDER_ID => $this->orderId,
        ];
    }
}
