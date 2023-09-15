<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SearchOrdersCrossRequest extends AbstractRequest
{
    private const FIELD_DIRECT = 'direct';
    private const FIELD_END_DATE = 'end-date';
    private const FIELD_FROM = 'from';
    private const FIELD_SIZE = 'size';
    private const FIELD_START_DATE = 'start-date';
    private const FIELD_STATE = 'state';
    private const FIELD_SUB_UID = 'sub-uid';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/cross-margin/loan-orders';

    private const STATE_ACCRUAL = 'accrual';
    private const STATE_CLEARED = 'cleared';
    private const STATE_CREATED = 'created';
    private const STATE_INVALID = 'invalid';
    private const STATES = [
        self::STATE_ACCRUAL,
        self::STATE_CLEARED,
        self::STATE_CREATED,
        self::STATE_INVALID,
    ];

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 100;

    private ?string $state = null;
    private ?string $startDate = null;
    private ?string $endDate = null;
    private ?string $currency = null;
    private ?string $from = null;
    private ?string $direct = null;
    private ?int $size = null;
    private ?string $subUid = null;

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
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
        if ($this->state) {
            $this->validateList($this->state, self::FIELD_STATE, self::STATES);
        }
        if ($this->startDate && !preg_match('/\d{4}-\d{2}-\d{2}/', $this->startDate)) {
            $this->throwValidateException(self::FIELD_START_DATE);
        }
        if ($this->endDate) {
            if (!preg_match('/\d{4}-\d{2}-\d{2}/', $this->endDate)) {
                $this->throwValidateException(self::FIELD_END_DATE);
            }
            if ($this->startDate && $this->startDate > $this->endDate) {
                $this->throwValidateException(self::FIELD_END_DATE);
            }
        }
        if ($this->direct) {
            $this->validateList($this->direct, self::FIELD_DIRECT, EnumHelper::DIRECTS);
        }
        if ($this->size) {
            $this->validateRange((string) $this->size, self::FIELD_SIZE, self::SIZE_MIN, self::SIZE_MAX);
        }
        if ($this->subUid) {
            $this->validateInteger($this->subUid, self::FIELD_SUB_UID);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->currency) {
            $result[self::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->state) {
            $result[self::FIELD_STATE] = $this->state;
        }
        if ($this->startDate) {
            $result[self::FIELD_START_DATE] = $this->startDate;
        }
        if ($this->endDate) {
            $result[self::FIELD_END_DATE] = $this->endDate;
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
        if ($this->subUid) {
            $result[self::FIELD_SUB_UID] = $this->subUid;
        }

        return $result;
    }
}
