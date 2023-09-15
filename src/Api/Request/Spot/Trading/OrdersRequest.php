<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class OrdersRequest extends AbstractRequest
{
    private const FIELD_DIRECT = 'direct';
    private const FIELD_END_TIME = 'end-time';
    private const FIELD_FROM = 'from';
    private const FIELD_SIZE = 'size';
    private const FIELD_START_TIME = 'start-time';
    private const FIELD_STATES = 'states';
    private const FIELD_SYMBOL = 'symbol';
    private const FIELD_TYPES = 'types';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/orders';

    private const STATE_CANCELED = 'canceled';
    private const STATE_FILLED = 'filled';
    private const STATE_PARTIAL_CANCELED = 'partial-canceled';
    private const STATES = [
        self::STATE_CANCELED,
        self::STATE_FILLED,
        self::STATE_PARTIAL_CANCELED,
    ];

    private const TIME_MIN = 180 * 24 * 3600 * 1000;
    private const TIME_RANGE_MAX = 2 * 3600 * 1000;

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 100;

    private ?string $symbol = null;
    private ?array $types = null;
    private ?string $startTime = null;
    private ?string $endTime = null;
    private ?array $states = null;
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

    public function setStates(array $states): void
    {
        $this->states = $states;
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
                $this->validateList($type, self::FIELD_TYPES, EnumHelper::ORDER_TYPES);
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
        if ($this->states) {
            foreach ($this->states as $state) {
                if (!is_scalar($state)) {
                    $this->throwValidateException(self::FIELD_STATES);
                }
                $this->validateList($state, self::FIELD_STATES, self::STATES);
            }
        }
        if ($this->direct) {
            $this->validateList($this->direct, self::FIELD_DIRECT, EnumHelper::DIRECTS);
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
        if ($this->states) {
            $result[self::FIELD_STATES] = implode(',', $this->states);
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
