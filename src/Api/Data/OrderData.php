<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Exceptions\HtxValidateException;

class OrderData
{
    private const CLIENT_ORDER_ID_SIZE = 64;

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
        ValidateHelper::validateList($this->type, FieldHelper::FIELD_TYPE, EnumHelper::ORDER_TYPES);
        ValidateHelper::validateMaxLength($this->clientOrderId, FieldHelper::FIELD_CLIENT_ORDER_ID_HYPHEN, self::CLIENT_ORDER_ID_SIZE);
        if ($this->amount) {
            ValidateHelper::validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
            ValidateHelper::validateList($this->type, FieldHelper::FIELD_AMOUNT, EnumHelper::ORDER_MARKET_TYPES);
        }
        if ($this->price) {
            ValidateHelper::validateNumeric($this->price, FieldHelper::FIELD_PRICE);
            if (in_array($this->type, EnumHelper::ORDER_MARKET_TYPES, true)) {
                ValidateHelper::throwValidateException(FieldHelper::FIELD_PRICE);
            }
        }
        if ($this->source) {
            ValidateHelper::validateList($this->source, FieldHelper::FIELD_SOURCE, EnumHelper::SOURCES);
        }
        if ($this->selfMatchPrevent) {
            ValidateHelper::validateList(
                (string) $this->selfMatchPrevent,
                FieldHelper::FIELD_SELF_MATCH_PREVENT_HYPHEN,
                array_map(static fn (int $item) => (string) $item, EnumHelper::SELF_TRADINGS),
            );
        }
        if ($this->stopPrice) {
            ValidateHelper::validateNumeric($this->stopPrice, FieldHelper::FIELD_STOP_PRICE_HYPHEN);
        }
        if ($this->operator) {
            ValidateHelper::validateList($this->operator, FieldHelper::FIELD_OPERATOR, EnumHelper::OPERATORS);
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_ACCOUNT_ID_HYPHEN      => $this->accountId,
            FieldHelper::FIELD_SYMBOL                 => $this->symbol,
            FieldHelper::FIELD_TYPE                   => $this->type,
            FieldHelper::FIELD_CLIENT_ORDER_ID_HYPHEN => $this->clientOrderId,
        ];
        if ($this->amount) {
            $result[FieldHelper::FIELD_AMOUNT] = $this->amount;
        }
        if ($this->price) {
            $result[FieldHelper::FIELD_PRICE] = $this->price;
        }
        if ($this->source) {
            $result[FieldHelper::FIELD_SOURCE] = $this->source;
        }
        if ($this->selfMatchPrevent !== null) {
            $result[FieldHelper::FIELD_SELF_MATCH_PREVENT_HYPHEN] = $this->selfMatchPrevent;
        }
        if ($this->stopPrice) {
            $result[FieldHelper::FIELD_STOP_PRICE_HYPHEN] = $this->stopPrice;
        }
        if ($this->operator) {
            $result[FieldHelper::FIELD_OPERATOR] = $this->operator;
        }

        return $result;
    }
}
