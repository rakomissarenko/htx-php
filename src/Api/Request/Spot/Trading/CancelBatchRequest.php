<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CancelBatchRequest extends AbstractRequest
{
    private const FIELD_CLIENT_ORDER_IDS = 'client-order-ids';
    private const FIELD_ORDER_IDS = 'order-ids';

    protected const PATH = '/v1/order/orders/batchcancel';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const ORDER_IDS_SIZE = 50;
    private const CLIENT_ORDER_IDS_SIZE = 50;

    private ?array $orderIds = null;
    private ?array $clientOrderIds = null;

    public function setOrderIds(array $orderIds): void
    {
        $this->orderIds = $orderIds;
    }

    public function setClientOrderIds(array $clientOrderIds): void
    {
        $this->clientOrderIds = $clientOrderIds;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if (!$this->orderIds && !$this->clientOrderIds) {
            $this->throwValidateException(self::FIELD_ORDER_IDS);
        }
        if ($this->orderIds) {
            if (count($this->orderIds) > self::ORDER_IDS_SIZE) {
                $this->throwValidateException(self::FIELD_ORDER_IDS);
            }
            foreach ($this->orderIds as $orderId) {
                if (!is_scalar($orderId)) {
                    $this->throwValidateException(self::FIELD_ORDER_IDS);
                }
            }
        }
        if ($this->clientOrderIds) {
            if (count($this->clientOrderIds) > self::CLIENT_ORDER_IDS_SIZE) {
                $this->throwValidateException(self::FIELD_CLIENT_ORDER_IDS);
            }
            foreach ($this->clientOrderIds as $clientOrderId) {
                if (!is_scalar($clientOrderId)) {
                    $this->throwValidateException(self::FIELD_CLIENT_ORDER_IDS);
                }
            }
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->orderIds) {
            $result[self::FIELD_ORDER_IDS] = implode(',', $this->orderIds);
        }
        if ($this->clientOrderIds) {
            $result[self::FIELD_CLIENT_ORDER_IDS] = implode(',', $this->clientOrderIds);
        }

        return $result;
    }
}