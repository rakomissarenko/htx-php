<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class OpenOrdersRequest extends AbstractRequest
{
    private const FIELD_ACCOUNT_ID = 'account-id';
    private const FIELD_DIRECT = 'direct';
    private const FIELD_FROM = 'from';
    private const FIELD_SIDE = 'side';
    private const FIELD_SIZE = 'size';
    private const FIELD_SYMBOL = 'symbol';
    private const FIELD_TYPES = 'types';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/openOrders';

    private const SIDE_BUY = 'buy';
    private const SIDE_SELL = 'sell';
    private const SIDES = [
        self::SIDE_BUY,
        self::SIDE_SELL,
    ];

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

    private const DIRECT_NEXT = 'next';
    private const DIRECT_PREV = 'prev';
    private const DIRECTS = [
        self::DIRECT_NEXT,
        self::DIRECT_PREV,
    ];

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 500;

    private ?array $types = null;
    private ?string $from = null;
    private ?string $direct = null;
    private ?int $size = null;

    public function __construct(
        private string $accountId,
        private string $symbol,
        private string $side,
    ) {}

    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    public function setDirect(string $direct): void
    {
        $this->direct = $direct;
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
        $this->validateList($this->side, self::FIELD_SIDE, self::SIDES);
        if ($this->types) {
            foreach ($this->types as $type) {
                if (!is_scalar($type)) {
                    $this->throwValidateException(self::FIELD_TYPES);
                }
                $this->validateList((string) $type, self::FIELD_TYPES, self::TYPES);
            }
        }
        if ($this->direct) {
            $this->validateList($this->direct, self::FIELD_DIRECT, self::DIRECTS);
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
            self::FIELD_SYMBOL     => $this->symbol,
            self::FIELD_SIDE       => $this->side,
        ];
        if ($this->types) {
            $result[self::FIELD_TYPES] = implode(',', $this->types);
        }
        if ($this->from) {
            $result[self::FIELD_FROM] = $this->from;
        }
        if ($this->direct) {
            $result[self::FIELD_DIRECT] = $this->direct;
        }
        if ($this->size) {
            $result[self::FIELD_SIZE] = $this->size;
        }

        return $result;
    }
}
