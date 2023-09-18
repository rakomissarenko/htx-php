<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class HistoryRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/history';

    private const SIZE_MIN = 10;
    private const SIZE_MAX = 1000;

    private ?string $symbol = null;
    private ?string $startTime = null;
    private ?string $endTime = null;
    private ?string $direct = null;
    private ?int $size = null;

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    public function setStartTime(string $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function setEndTime(string $endTime): void
    {
        $this->endTime = $endTime;
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
        if ($this->startTime) {
            $this->validateInteger($this->startTime, FieldHelper::FIELD_START_TIME_HYPHEN);
        }
        if ($this->endTime) {
            $this->validateInteger($this->endTime, FieldHelper::FIELD_END_TIME_HYPHEN);
            if ($this->startTime && $this->startTime > $this->endTime) {
                $this->throwValidateException(FieldHelper::FIELD_END_TIME_HYPHEN);
            }
        }
        if ($this->direct) {
            ValidateHelper::validateList($this->direct, FieldHelper::FIELD_DIRECT, EnumHelper::DIRECTS);
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
        if ($this->startTime) {
            $result[FieldHelper::FIELD_START_TIME_HYPHEN] = $this->startTime;
        }
        if ($this->endTime) {
            $result[FieldHelper::FIELD_END_TIME_HYPHEN] = $this->endTime;
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
