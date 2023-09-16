<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class RepayInfoRequest extends AbstractRequest
{
    private const FIELD_END_TIME = 'endTime';
    private const FIELD_REPAY_ID = 'repayId';
    private const FIELD_START_TIME = 'startTime';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/account/repayment';

    private const LIMIT_MIN = 1;
    private const LIMIT_MAX = 100;

    private ?string $repayId = null;
    private ?string $accountId = null;
    private ?string $currency = null;
    private ?string $startTime = null;
    private ?string $endTime = null;
    private ?string $sort = null;
    private ?int $limit = null;
    private ?string $fromId = null;

    public function setRepayId(string $repayId): void
    {
        $this->repayId = $repayId;
    }

    public function setAccountId(string $accountId): void
    {
        $this->accountId = $accountId;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function setStartTime(string $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function setEndTime(string $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function setSort(string $sort): void
    {
        $this->sort = $sort;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function setFromId(string $fromId): void
    {
        $this->fromId = $fromId;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->startTime) {
            $this->validateInteger($this->startTime, self::FIELD_START_TIME);
        }
        if ($this->endTime) {
            $this->validateInteger($this->endTime, self::FIELD_END_TIME);
        }
        if ($this->sort) {
            $this->validateList($this->sort, FieldHelper::FIELD_SORT, EnumHelper::SORTS);
        }
        if ($this->limit) {
            $this->validateRange(
                (string) $this->limit,
                FieldHelper::FIELD_LIMIT,
                (string) self::LIMIT_MIN,
                (string) self::LIMIT_MAX,
            );
        }
        if ($this->fromId) {
            $this->validateInteger($this->fromId, FieldHelper::FIELD_FROM_ID);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->repayId) {
            $result[self::FIELD_REPAY_ID] = $this->repayId;
        }
        if ($this->accountId) {
            $result[FieldHelper::FIELD_ACCOUNT_ID] = $this->accountId;
        }
        if ($this->currency) {
            $result[FieldHelper::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->startTime) {
            $result[self::FIELD_START_TIME] = $this->startTime;
        }
        if ($this->endTime) {
            $result[self::FIELD_END_TIME] = $this->endTime;
        }
        if ($this->sort) {
            $result[FieldHelper::FIELD_SORT] = $this->sort;
        }
        if ($this->limit) {
            $result[FieldHelper::FIELD_LIMIT] = $this->limit;
        }
        if ($this->fromId) {
            $result[FieldHelper::FIELD_FROM_ID] = $this->fromId;
        }

        return $result;
    }
}
