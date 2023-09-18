<?php

namespace Feralonso\Htx\Api\Request\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CancelRequest extends AbstractRequest
{
    protected const PATH = '/v2/algo-orders/cancellation';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const ORDERS_MIN = 1;
    private const ORDERS_MAX = 50;

    public function __construct(private array $clientOrderIds) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateRange(
            count($this->clientOrderIds),
            FieldHelper::FIELD_CLIENT_ORDER_IDS,
            (string) self::ORDERS_MIN,
            (string) self::ORDERS_MAX,
        );
        foreach ($this->clientOrderIds as $clientOrderId) {
            if (!is_scalar($clientOrderId)) {
                $this->throwValidateException(FieldHelper::FIELD_CLIENT_ORDER_IDS);
            }
        }
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_CLIENT_ORDER_IDS => $this->clientOrderIds,
        ];
    }
}
