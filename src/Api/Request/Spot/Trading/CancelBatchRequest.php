<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CancelBatchRequest extends AbstractRequest
{
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
            $this->throwValidateException(FieldHelper::FIELD_ORDER_IDS_HYPHEN);
        }
        if ($this->orderIds) {
            if (count($this->orderIds) > self::ORDER_IDS_SIZE) {
                $this->throwValidateException(FieldHelper::FIELD_ORDER_IDS_HYPHEN);
            }
            ValidateHelper::validateArrayScalar($this->orderIds, FieldHelper::FIELD_ORDER_IDS_HYPHEN);
        }
        if ($this->clientOrderIds) {
            if (count($this->clientOrderIds) > self::CLIENT_ORDER_IDS_SIZE) {
                $this->throwValidateException(FieldHelper::FIELD_CLIENT_ORDER_IDS_HYPHEN);
            }
            ValidateHelper::validateArrayScalar($this->clientOrderIds, FieldHelper::FIELD_CLIENT_ORDER_IDS_HYPHEN);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->orderIds) {
            $result[FieldHelper::FIELD_ORDER_IDS_HYPHEN] = implode(',', $this->orderIds);
        }
        if ($this->clientOrderIds) {
            $result[FieldHelper::FIELD_CLIENT_ORDER_IDS_HYPHEN] = implode(',', $this->clientOrderIds);
        }

        return $result;
    }
}
