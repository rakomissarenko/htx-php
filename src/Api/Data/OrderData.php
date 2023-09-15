<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Exceptions\HtxValidateException;

class OrderData
{
    private const FIELD_ACCOUNT_ID = 'account-id';
    private const FIELD_AMOUNT = 'amount';
    private const FIELD_CLIENT_ORDER_ID = 'client-order-id';
    private const FIELD_OPERATOR = 'operator';
    private const FIELD_PRICE = 'price';
    private const FIELD_SELF_MATCH_PREVENT = 'self-match-prevent';
    private const FIELD_SOURCE = 'source';
    private const FIELD_STOP_PRICE = 'stop-price';
    private const FIELD_SYMBOL = 'symbol';
    private const FIELD_TYPE = 'type';

    private const CLIENT_ORDER_ID_SIZE = 64;

    private const TYPE_BUY_IOC = 'buy-ioc';
    private const TYPE_BUY_LIMIT = 'buy-limit';
    private const TYPE_BUY_LIMIT_FOK = 'buy-limit-fok';
    private const TYPE_BUY_LIMIT_MARKET = 'buy-limit-maker';
    private const TYPE_BUY_MARKET = 'buy-market';
    private const TYPE_BUY_STOP_LIMIT = 'buy-stop-limit';
    private const TYPE_BUY_STOP_LIMIT_FOK = 'buy-stop-limit-fok';
    private const TYPE_SELL_IOC = 'sell-ioc';
    private const TYPE_SELL_LIMIT = 'sell-limit';
    private const TYPE_SELL_LIMIT_FOK = 'sell-limit-fok';
    private const TYPE_SELL_LIMIT_MARKET = 'sell-limit-maker';
    private const TYPE_SELL_MARKET = 'sell-market';
    private const TYPE_SELL_STOP_LIMIT = 'sell-stop-limit';
    private const TYPE_SELL_STOP_LIMIT_FOK = 'sell-stop-limit-fok';
    private const TYPES = [
        self::TYPE_BUY_IOC,
        self::TYPE_BUY_LIMIT,
        self::TYPE_BUY_LIMIT_FOK,
        self::TYPE_BUY_LIMIT_MARKET,
        self::TYPE_BUY_MARKET,
        self::TYPE_BUY_STOP_LIMIT,
        self::TYPE_BUY_STOP_LIMIT_FOK,
        self::TYPE_SELL_IOC,
        self::TYPE_SELL_LIMIT,
        self::TYPE_SELL_LIMIT_FOK,
        self::TYPE_SELL_LIMIT_MARKET,
        self::TYPE_SELL_MARKET,
        self::TYPE_SELL_STOP_LIMIT,
        self::TYPE_SELL_STOP_LIMIT_FOK,
    ];
    private const TYPES_MARKET = [
        self::TYPE_BUY_LIMIT_MARKET,
        self::TYPE_BUY_MARKET,
        self::TYPE_SELL_LIMIT_MARKET,
        self::TYPE_SELL_MARKET,
    ];

    private const SOURCE_C2C = 'c2c-margin-api';
    private const SOURCE_MARGIN = 'margin-api';
    private const SOURCE_SPOT = 'spot-api';
    private const SOURCE_SUPER_MARGIN = 'super-margin-api';
    private const SOURCES = [
        self::SOURCE_C2C,
        self::SOURCE_MARGIN,
        self::SOURCE_SPOT,
        self::SOURCE_SUPER_MARGIN,
    ];

    private const SELF_TRADING_ALLOW = 0;
    private const SELF_TRADING_DISALLOW = 1;
    private const SELF_TRADINGS = [
        self::SELF_TRADING_ALLOW,
        self::SELF_TRADING_DISALLOW,
    ];

    private const OPERATOR_GTE = 'gte';
    private const OPERATOR_LTE = 'lte';
    private const OPERATORS = [
        self::OPERATOR_GTE,
        self::OPERATOR_LTE,
    ];

    private ?string $amount = null;
    private ?string $price = null;
    private ?string $source = null;
    private ?int $selfMatchPrevent = null;
    private ?string $stopPrice = null;
    private ?string $operator = null;

    public function __construct(
        private string $accountId,
        private string $symbol,
        private string $type,
        private string $clientOrderId,
    ) {}

    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    public function setSelfMatchPrevent(int $selfMatchPrevent): void
    {
        $this->selfMatchPrevent = $selfMatchPrevent;
    }

    public function setStopPrice(string $stopPrice): void
    {
        $this->stopPrice = $stopPrice;
    }

    public function setOperator(string $operator): void
    {
        $this->operator = $operator;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        //$this->validateList($this->type, self::FIELD_TYPE, self::TYPES);
        if (mb_strlen($this->clientOrderId) > self::CLIENT_ORDER_ID_SIZE) {
            //$this->throwValidateException(self::FIELD_CLIENT_ORDER_ID);
        }
        if ($this->amount) {
            //$this->validateNumeric($this->amount, self::FIELD_AMOUNT);
            //$this->validateList($this->type, self::FIELD_AMOUNT, self::TYPES_MARKET);
        }
        if ($this->price) {
            //$this->validateNumeric($this->price, self::FIELD_PRICE);
            if (in_array($this->type, self::TYPES_MARKET, true)) {
                //$this->throwValidateException(self::FIELD_PRICE);
            }
        }
        if ($this->source) {
            //$this->validateList($this->source, self::FIELD_SOURCE, self::SOURCES);
        }
        if ($this->selfMatchPrevent) {
            //$this->validateList($this->selfMatchPrevent, self::FIELD_SELF_MATCH_PREVENT, self::SELF_TRADINGS);
        }
        if ($this->stopPrice) {
            //$this->validateNumeric($this->stopPrice, self::FIELD_STOP_PRICE);
        }
        if ($this->operator) {
            //$this->validateList($this->operator, self::FIELD_OPERATOR, self::OPERATORS);
        }
    }

    public function toArray(): array
    {
        $result = [
            self::FIELD_ACCOUNT_ID      => $this->accountId,
            self::FIELD_SYMBOL          => $this->symbol,
            self::FIELD_TYPE            => $this->type,
            self::FIELD_CLIENT_ORDER_ID => $this->clientOrderId,
        ];
        if ($this->amount) {
            $result[self::FIELD_AMOUNT] = $this->amount;
        }
        if ($this->price) {
            $result[self::FIELD_PRICE] = $this->price;
        }
        if ($this->source) {
            $result[self::FIELD_SOURCE] = $this->source;
        }
        if ($this->selfMatchPrevent !== null) {
            $result[self::FIELD_SELF_MATCH_PREVENT] = $this->selfMatchPrevent;
        }
        if ($this->stopPrice) {
            $result[self::FIELD_STOP_PRICE] = $this->stopPrice;
        }
        if ($this->operator) {
            $result[self::FIELD_OPERATOR] = $this->operator;
        }

        return $result;
    }
}
