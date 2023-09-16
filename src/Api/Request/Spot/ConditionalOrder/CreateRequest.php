<?php

namespace Feralonso\Htx\Api\Request\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CreateRequest extends AbstractRequest
{
    private const FIELD_ORDER_PRICE = 'orderPrice';
    private const FIELD_ORDER_SIDE = 'orderSide';
    private const FIELD_ORDER_SIZE = 'orderSize';
    private const FIELD_ORDER_TYPE = 'orderType';
    private const FIELD_ORDER_VALUE = 'orderValue';
    private const FIELD_STOP_PRICE = 'stopPrice';
    private const FIELD_TIME_IN_FORCE = 'timeInForce';
    private const FIELD_TRAILING_RATE = 'trailingRate';

    protected const PATH = '/v2/algo-orders';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const ORDER_TYPE_LIMIT = 'limit';
    private const ORDER_TYPE_MARKET = 'market';
    private const ORDER_TYPES = [
        self::ORDER_TYPE_LIMIT,
        self::ORDER_TYPE_MARKET,
    ];

    private const TIME_BOC = 'boc';
    private const TIME_IOC = 'ioc';
    private const TIME_FOK = 'fok';
    private const TIME_GTC = 'gtc';
    private const TIMES = [
        self::TIME_BOC,
        self::TIME_IOC,
        self::TIME_FOK,
        self::TIME_GTC,
    ];

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
        $this->validateList($this->orderSide, self::FIELD_ORDER_SIDE, EnumHelper::ORDER_SIDES);
        $this->validateList($this->orderType, self::FIELD_ORDER_TYPE, self::ORDER_TYPES);
        $this->validateSize($this->clientOrderId, FieldHelper::FIELD_CLIENT_ORDER_ID, self::CLIENT_ORDER_ID_SIZE);
        if ($this->orderPrice) {
            $this->validateNumeric($this->orderPrice, self::FIELD_ORDER_PRICE);
            if ($this->orderType === self::ORDER_TYPE_MARKET) {
                $this->throwValidateException(self::FIELD_ORDER_PRICE);
            }
        }
        if ($this->orderSize) {
            $this->validateNumeric($this->orderSize, self::FIELD_ORDER_SIZE);
            if ($this->orderType === self::ORDER_TYPE_MARKET && $this->orderSide === EnumHelper::ORDER_SIDE_BUY) {
                $this->throwValidateException(self::FIELD_ORDER_SIZE);
            }
        }
        if ($this->orderValue) {
            $this->validateNumeric($this->orderValue, self::FIELD_ORDER_VALUE);
            if ($this->orderType !== self::ORDER_TYPE_MARKET || $this->orderSide !== EnumHelper::ORDER_SIDE_BUY) {
                $this->throwValidateException(self::FIELD_ORDER_SIZE);
            }
        }
        if ($this->timeInForce) {
            $this->validateList($this->timeInForce, self::FIELD_TIME_IN_FORCE, self::TIMES);
            if ($this->orderType === self::ORDER_TYPE_MARKET && in_array($this->timeInForce, [
                self::TIME_BOC,
                self::TIME_GTC,
                self::TIME_FOK,
            ], true)) {
                $this->throwValidateException(self::FIELD_TIME_IN_FORCE);
            }
        }
        if ($this->stopPrice) {
            $this->validateNumeric($this->stopPrice, self::FIELD_STOP_PRICE);
        }
        if ($this->trailingRate) {
            $this->validateRange(
                $this->trailingRate,
                self::FIELD_TRAILING_RATE,
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
            self::FIELD_ORDER_SIDE             => $this->orderSide,
            self::FIELD_ORDER_TYPE             => $this->orderType,
            FieldHelper::FIELD_CLIENT_ORDER_ID => $this->clientOrderId,
        ];
        if ($this->orderPrice) {
            $result[self::FIELD_ORDER_PRICE] = $this->orderPrice;
        }
        if ($this->orderSize) {
            $result[self::FIELD_ORDER_SIZE] = $this->orderSize;
        }
        if ($this->orderValue) {
            $result[self::FIELD_ORDER_VALUE] = $this->orderValue;
        }
        if ($this->timeInForce) {
            $result[self::FIELD_TIME_IN_FORCE] = $this->timeInForce;
        }
        if ($this->stopPrice) {
            $result[self::FIELD_STOP_PRICE] = $this->stopPrice;
        }
        if ($this->trailingRate) {
            $result[self::FIELD_TRAILING_RATE] = $this->trailingRate;
        }

        return $result;
    }
}
