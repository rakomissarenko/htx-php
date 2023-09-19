<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
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

    private const TYPE_BUY_LIMIT_MARKET = 'buy-limit-maker';
    private const TYPE_BUY_MARKET = 'buy-market';
    private const TYPE_SELL_LIMIT_MARKET = 'sell-limit-maker';
    private const TYPE_SELL_MARKET = 'sell-market';
    private const TYPES_MARKET = [
        self::TYPE_BUY_LIMIT_MARKET,
        self::TYPE_BUY_MARKET,
        self::TYPE_SELL_LIMIT_MARKET,
        self::TYPE_SELL_MARKET,
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
        ValidateHelper::validateList($this->type, self::FIELD_TYPE, EnumHelper::ORDER_TYPES);
        ValidateHelper::validateMaxLength($this->clientOrderId, self::FIELD_CLIENT_ORDER_ID, self::CLIENT_ORDER_ID_SIZE);
        if ($this->amount) {
            ValidateHelper::validateNumeric($this->amount, self::FIELD_AMOUNT);
            ValidateHelper::validateList($this->type, self::FIELD_AMOUNT, self::TYPES_MARKET);
        }
        if ($this->price) {
            ValidateHelper::validateNumeric($this->price, self::FIELD_PRICE);
            if (in_array($this->type, self::TYPES_MARKET, true)) {
                ValidateHelper::throwValidateException(self::FIELD_PRICE);
            }
        }
        if ($this->source) {
            ValidateHelper::validateList($this->source, self::FIELD_SOURCE, EnumHelper::SOURCES);
        }
        if ($this->selfMatchPrevent) {
            ValidateHelper::validateList(
                (string) $this->selfMatchPrevent,
                self::FIELD_SELF_MATCH_PREVENT,
                array_map(static fn (int $item) => (string) $item, self::SELF_TRADINGS),
            );
        }
        if ($this->stopPrice) {
            ValidateHelper::validateNumeric($this->stopPrice, self::FIELD_STOP_PRICE);
        }
        if ($this->operator) {
            ValidateHelper::validateList($this->operator, self::FIELD_OPERATOR, self::OPERATORS);
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
