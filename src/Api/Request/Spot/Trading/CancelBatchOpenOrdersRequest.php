<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CancelBatchOpenOrdersRequest extends AbstractRequest
{
    private const FIELD_ACCOUNT_ID = 'account-id';
    private const FIELD_SIDE = 'side';
    private const FIELD_SIZE = 'size';
    private const FIELD_SYMBOL = 'symbol';
    private const FIELD_TYPES = 'types';

    protected const PATH = '/v1/order/orders/batchCancelOpenOrders';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const SYMBOLS_SIZE = 10;

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

    private const SIDE_BUY = 'buy';
    private const SIDE_SELL = 'sell';
    private const SIDES = [
        self::SIDE_BUY,
        self::SIDE_SELL,
    ];

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 100;

    private ?array $symbols = null;
    private ?array $types = null;
    private ?string $side = null;
    private ?int $size = null;

    public function __construct(private string $accountId) {}

    public function setSymbols(array $symbols): void
    {
        $this->symbols = $symbols;
    }

    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    public function setSide(string $side): void
    {
        $this->side = $side;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->symbols) {
            if (count($this->symbols) > self::SYMBOLS_SIZE) {
                $this->throwValidateException(self::FIELD_SYMBOL);
            }
            foreach ($this->symbols as $symbol) {
                if (!is_scalar($symbol)) {
                    $this->throwValidateException(self::FIELD_SYMBOL);
                }
            }
        }
        if ($this->types) {
            foreach ($this->types as $type) {
                if (!is_scalar($type)) {
                    $this->throwValidateException(self::FIELD_TYPES);
                }
                $this->validateList((string) $type, self::FIELD_TYPES, self::TYPES);
            }
        }
        if ($this->side) {
            $this->validateList($this->side, self::FIELD_SIDE, self::SIDES);
        }
        if ($this->size) {
            $this->validateRange(
                (string) $this->size,
                self::FIELD_SIZE,
                (string) self::SIZE_MIN,
                (string) self::SIZE_MAX,
            );
        }
    }

    public function toArray(): array
    {
        $result = [
            self::FIELD_ACCOUNT_ID => $this->accountId,
        ];
        if ($this->symbols) {
            $result[self::FIELD_SYMBOL] = implode(',', $this->symbols);
        }
        if ($this->types) {
            $result[self::FIELD_TYPES] = implode(',', $this->types);
        }
        if ($this->side) {
            $result[self::FIELD_SIDE] = $this->side;
        }
        if ($this->size) {
            $result[self::FIELD_SIZE] = $this->size;
        }

        return $result;
    }
}
