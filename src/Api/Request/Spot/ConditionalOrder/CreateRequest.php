<?php

namespace Feralonso\Htx\Api\Request\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CreateRequest extends AbstractRequest
{
    protected const PATH = '/v2/algo-orders';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const CLIENT_ORDER_ID_SIZE = 64;

    private const TRAILING_RATE_MIN = 0.001;
    private const TRAILING_RATE_MAX = 0.05;

    private ?string $orderPrice = null;
    private ?string $orderSize = null;
    private ?string $orderValue = null;
    private ?string $timeInForce = null;
    private ?string $stopPrice = null;
    private ?string $trailingRate = null;

    public function __construct(
        private int $accountId,
        private string $symbol,
        private string $orderSide,
        private string $orderType,
        private string $clientOrderId,
    ) {}

    public function setOrderPrice(string $orderPrice): void
    {
        $this->orderPrice = $orderPrice;
    }

    public function setOrderSize(string $orderSize): void
    {
        $this->orderSize = $orderSize;
    }

    public function setOrderValue(string $orderValue): void
    {
        $this->orderValue = $orderValue;
    }

    public function setTimeInForce(string $timeInForce): void
    {
        $this->timeInForce = $timeInForce;
    }

    public function setStopPrice(string $stopPrice): void
    {
        $this->stopPrice = $stopPrice;
    }

    public function setTrailingRate(string $trailingRate): void
    {
        $this->trailingRate = $trailingRate;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateList($this->orderSide, FieldHelper::FIELD_ORDER_SIDE, EnumHelper::ORDER_SIDES);
        ValidateHelper::validateList($this->orderType, FieldHelper::FIELD_ORDER_TYPE, EnumHelper::ORDER_BID_TYPES);
        $this->validateSize($this->clientOrderId, FieldHelper::FIELD_CLIENT_ORDER_ID, self::CLIENT_ORDER_ID_SIZE);
        if ($this->orderPrice) {
            $this->validateNumeric($this->orderPrice, FieldHelper::FIELD_ORDER_PRICE);
            if ($this->orderType === EnumHelper::ORDER_BID_TYPE_MARKET) {
                $this->throwValidateException(FieldHelper::FIELD_ORDER_PRICE);
            }
        }
        if ($this->orderSize) {
            $this->validateNumeric($this->orderSize, FieldHelper::FIELD_ORDER_SIZE);
            if ($this->orderType === EnumHelper::ORDER_BID_TYPE_MARKET && $this->orderSide === EnumHelper::ORDER_SIDE_BUY) {
                $this->throwValidateException(FieldHelper::FIELD_ORDER_SIZE);
            }
        }
        if ($this->orderValue) {
            $this->validateNumeric($this->orderValue, FieldHelper::FIELD_ORDER_VALUE);
            if ($this->orderType !== EnumHelper::ORDER_BID_TYPE_MARKET || $this->orderSide !== EnumHelper::ORDER_SIDE_BUY) {
                $this->throwValidateException(FieldHelper::FIELD_ORDER_SIZE);
            }
        }
        if ($this->timeInForce) {
            ValidateHelper::validateList($this->timeInForce, FieldHelper::FIELD_TIME_IN_FORCE, EnumHelper::TIMES);
            if ($this->orderType === EnumHelper::ORDER_BID_TYPE_MARKET && in_array($this->timeInForce, [
                EnumHelper::TIME_BOC,
                EnumHelper::TIME_GTC,
                EnumHelper::TIME_FOK,
            ], true)) {
                $this->throwValidateException(FieldHelper::FIELD_TIME_IN_FORCE);
            }
        }
        if ($this->stopPrice) {
            $this->validateNumeric($this->stopPrice, FieldHelper::FIELD_STOP_PRICE);
        }
        if ($this->trailingRate) {
            $this->validateRange(
                $this->trailingRate,
                FieldHelper::FIELD_TRAILING_RATE,
                (string) self::TRAILING_RATE_MIN,
                (string) self::TRAILING_RATE_MAX,
            );
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_ACCOUNT_ID      => $this->accountId,
            FieldHelper::FIELD_SYMBOL          => $this->symbol,
            FieldHelper::FIELD_ORDER_SIDE      => $this->orderSide,
            FieldHelper::FIELD_ORDER_TYPE      => $this->orderType,
            FieldHelper::FIELD_CLIENT_ORDER_ID => $this->clientOrderId,
        ];
        if ($this->orderPrice) {
            $result[FieldHelper::FIELD_ORDER_PRICE] = $this->orderPrice;
        }
        if ($this->orderSize) {
            $result[FieldHelper::FIELD_ORDER_SIZE] = $this->orderSize;
        }
        if ($this->orderValue) {
            $result[FieldHelper::FIELD_ORDER_VALUE] = $this->orderValue;
        }
        if ($this->timeInForce) {
            $result[FieldHelper::FIELD_TIME_IN_FORCE] = $this->timeInForce;
        }
        if ($this->stopPrice) {
            $result[FieldHelper::FIELD_STOP_PRICE] = $this->stopPrice;
        }
        if ($this->trailingRate) {
            $result[FieldHelper::FIELD_TRAILING_RATE] = $this->trailingRate;
        }

        return $result;
    }
}
