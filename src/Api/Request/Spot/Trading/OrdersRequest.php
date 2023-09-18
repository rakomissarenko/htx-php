<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class OrdersRequest extends AbstractRequest
{
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
                    $this->throwValidateException(FieldHelper::FIELD_TYPES);
                }
                $this->validateList($type, FieldHelper::FIELD_TYPES, EnumHelper::ORDER_TYPES);
            }
        }
        if ($this->startTime) {
            $this->validateInteger($this->startTime, FieldHelper::FIELD_START_TIME_HYPHEN);
            $this->validateRange(
                $this->startTime,
                FieldHelper::FIELD_START_TIME_HYPHEN,
                (string) (microtime(true) * 1000 - self::TIME_MIN),
                (string) (microtime(true) * 1000),
            );
        }
        if ($this->endTime) {
            $this->validateInteger($this->endTime, FieldHelper::FIELD_END_TIME_HYPHEN);
            if ($this->startTime) {
                $this->validateRange(
                    $this->startTime,
                    FieldHelper::FIELD_START_TIME_HYPHEN,
                    (string) $this->startTime,
                    (string) ($this->startTime + self::TIME_RANGE_MAX),
                );
            } else {
                $this->validateRange(
                    $this->endTime,
                    FieldHelper::FIELD_END_TIME_HYPHEN,
                    (string) (microtime(true) * 1000 - self::TIME_MIN + self::TIME_RANGE_MAX),
                    (string) (microtime(true) * 1000),
                );
            }
        }
        if ($this->states) {
            foreach ($this->states as $state) {
                if (!is_scalar($state)) {
                    $this->throwValidateException(FieldHelper::FIELD_STATES);
                }
                $this->validateList($state, FieldHelper::FIELD_STATES, self::STATES);
            }
        }
        if ($this->direct) {
            $this->validateList($this->direct, FieldHelper::FIELD_DIRECT, EnumHelper::DIRECTS);
        }
        if ($this->size) {
            $this->validateRange(
                (string) $this->size,
                FieldHelper::FIELD_SIZE,
                (string) self::SIZE_MIN,
                (string) self::SIZE_MAX,
            );
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->symbol) {
            $result[FieldHelper::FIELD_SYMBOL] = $this->symbol;
        }
        if ($this->types) {
            $result[FieldHelper::FIELD_TYPES] = implode(',', $this->types);
        }
        if ($this->startTime) {
            $result[FieldHelper::FIELD_START_TIME_HYPHEN] = $this->startTime;
        }
        if ($this->endTime) {
            $result[FieldHelper::FIELD_END_TIME_HYPHEN] = $this->endTime;
        }
        if ($this->states) {
            $result[FieldHelper::FIELD_STATES] = implode(',', $this->states);
        }
        if ($this->from) {
            $result[FieldHelper::FIELD_FROM] = $this->from;
        }
        if ($this->direct) {
            $result[FieldHelper::FIELD_DIRECT] = $this->direct;
        }
        if ($this->size) {
            $result[FieldHelper::FIELD_SIZE] = $this->size;
        }

        return $result;
    }
}
