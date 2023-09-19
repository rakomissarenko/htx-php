<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Data\OrderData;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CreateBatchRequest extends AbstractRequest
{
    protected const PATH = '/v1/order/batch-orders';
    protected const PERMISSION = self::PERMISSION_TRADE;

    /** @var OrderData[] */
    private array $orders = [];

    public function addOrder(OrderData $orderData): void
    {
        $this->orders[] = $orderData;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if (!$this->orders) {
            ValidateHelper::throwValidateException(FieldHelper::FIELD_ORDERS);
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
