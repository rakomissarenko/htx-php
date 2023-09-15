<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Data\OrderData;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CreateBatchRequest extends AbstractRequest
{
    private const FIELD_ORDERS = 'orders';

    protected const PATH = '/v1/order/batch-orders';
    protected const PERMISSION = self::PERMISSION_TRADE;

    /** @var OrderData[] */
    private array $orders = [];

    public function addOrder(OrderData $orderData): void
    {
        $this->orders = $orderData;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if (!$this->orders) {
            $this->throwValidateException(self::FIELD_ORDERS);
        }
        foreach ($this->orders as $orderData) {
            $orderData->validate();
        }
    }

    public function toArray(): array
    {
        return array_map(static fn (OrderData $orderData): array => $orderData->toArray(), $this->orders);
    }
}
