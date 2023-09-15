<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Data\OrderData;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CreateRequest extends AbstractRequest
{
    protected const PATH = '/v1/order/orders/place';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(private OrderData $orderData) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->orderData->validate();
    }

    public function toArray(): array
    {
        return $this->orderData->toArray();
    }
}
