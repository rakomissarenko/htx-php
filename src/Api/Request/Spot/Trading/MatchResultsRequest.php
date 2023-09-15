<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class MatchResultsRequest extends AbstractRequest
{
    private const FIELD_SYMBOL = 'symbol';
    private const FIELD_TYPES = 'types';
    private const FIELD_START_TIME = 'start-time';
    private const FIELD_END_TIME = 'end-time';
    private const FIELD_FROM = 'from';
    private const FIELD_DIRECT = 'direct';
    private const FIELD_SIZE = 'size';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/matchresults';

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

    private const TIME_MIN = 120 * 24 * 3600 * 1000;
    private const TIME_RANGE_MAX = 2 * 24 * 3600 * 1000;

    private const DIRECT_NEXT = 'next';
    private const DIRECT_PREV = 'prev';
    private const DIRECTS = [
        self::DIRECT_NEXT,
        self::DIRECT_PREV,
    ];

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 500;

    private ?string $symbol = null;
    private ?array $types = null;
    private ?string $startTime = null;
    private ?string $endTime = null;
    private ?string $from = null;
    private ?string $direct = null;
    private ?int $size = null;

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    public function setStartTime(string $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function setEndTime(string $endTime): void
    {
        $this->endTime = $endTime;
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
        if ($this->types) {
            foreach ($this->types as $type) {
                if (!is_scalar($type)) {
                    $this->throwValidateException(self::FIELD_TYPES);
                }
                $this->validateList($type, self::FIELD_TYPES, self::TYPES);
            }
        }
        if ($this->startTime) {
            $this->validateInteger($this->startTime, self::FIELD_START_TIME);
            $this->validateRange(
                $this->startTime,
                self::FIELD_START_TIME,
                (string) (microtime(true) * 1000 - self::TIME_MIN),
                (string) (microtime(true) * 1000),
            );
        }
        if ($this->endTime) {
            $this->validateInteger($this->endTime, self::FIELD_END_TIME);
            if ($this->startTime) {
                $this->validateRange(
                    $this->startTime,
                    self::FIELD_START_TIME,
                    (string) $this->startTime,
                    (string) ($this->startTime + self::TIME_RANGE_MAX),
                );
            } else {
                $this->validateRange(
                    $this->endTime,
                    self::FIELD_END_TIME,
                    (string) (microtime(true) * 1000 - self::TIME_MIN + self::TIME_RANGE_MAX),
                    (string) (microtime(true) * 1000),
                );
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
        $result = [];
        if ($this->symbol) {
            $result[self::FIELD_SYMBOL] = $this->symbol;
        }
        if ($this->types) {
            $result[self::FIELD_TYPES] = implode(',', $this->types);
        }
        if ($this->startTime) {
            $result[self::FIELD_START_TIME] = $this->startTime;
        }
        if ($this->endTime) {
            $result[self::FIELD_END_TIME] = $this->endTime;
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
