<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SearchOrdersRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/margin/loan-orders';

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 100;

    private ?string $symbol = null;
    private ?array $states = null;
    private ?string $startDate = null;
    private ?string $endDate = null;
    private ?string $from = null;
    private ?string $direct = null;
    private ?int $size = null;
    private ?string $subUid = null;

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    public function setStates(array $states): void
    {
        $this->states = $states;
    }

    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
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

    public function setSubUid(string $subUid): void
    {
        $this->subUid = $subUid;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->states) {
            foreach ($this->states as $state) {
                if (!is_scalar($state)) {
                    $this->throwValidateException(FieldHelper::FIELD_STATES);
                }
                ValidateHelper::validateList((string) $state, FieldHelper::FIELD_STATES, EnumHelper::ORDER_CROSS_STATES);
            }
        }
        if ($this->startDate && !preg_match('/\d{4}-\d{2}-\d{2}/', $this->startDate)) {
            $this->throwValidateException(FieldHelper::FIELD_START_DATE_HYPHEN);
        }
        if ($this->endDate) {
            if (!preg_match('/\d{4}-\d{2}-\d{2}/', $this->endDate)) {
                $this->throwValidateException(FieldHelper::FIELD_END_DATE_HYPHEN);
            }
            if ($this->startDate && $this->startDate > $this->endDate) {
                $this->throwValidateException(FieldHelper::FIELD_END_DATE_HYPHEN);
            }
        }
        if ($this->direct) {
            ValidateHelper::validateList($this->direct, FieldHelper::FIELD_DIRECT, EnumHelper::DIRECTS);
        }
        if ($this->size) {
            $this->validateRange((string) $this->size, FieldHelper::FIELD_SIZE, self::SIZE_MIN, self::SIZE_MAX);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->symbol) {
            $result[FieldHelper::FIELD_SYMBOL] = $this->symbol;
        }
        if ($this->states) {
            $result[FieldHelper::FIELD_STATES] = implode(',', $this->states);
        }
        if ($this->startDate) {
            $result[FieldHelper::FIELD_START_DATE_HYPHEN] = $this->startDate;
        }
        if ($this->endDate) {
            $result[FieldHelper::FIELD_END_DATE_HYPHEN] = $this->endDate;
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
        if ($this->subUid) {
            $result[FieldHelper::FIELD_SUB_UID_HYPHEN] = $this->subUid;
        }

        return $result;
    }
}
