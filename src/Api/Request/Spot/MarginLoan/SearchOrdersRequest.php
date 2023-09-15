<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SearchOrdersRequest extends AbstractRequest
{
    private const FIELD_DIRECT = 'direct';
    private const FIELD_END_DATE = 'end-date';
    private const FIELD_FROM = 'from';
    private const FIELD_SIZE = 'size';
    private const FIELD_START_DATE = 'start-date';
    private const FIELD_STATES = 'states';
    private const FIELD_SUB_UID = 'sub-uid';
    private const FIELD_SYMBOL = 'symbol';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/margin/loan-orders';

    private const STATE_ACCRUAL = 'accrual';
    private const STATE_CLEARED = 'cleared';
    private const STATE_CREATED = 'created';
    private const STATE_FAILED = 'failed';
    private const STATE_INVALID = 'invalid';
    private const STATES = [
        self::STATE_ACCRUAL,
        self::STATE_CLEARED,
        self::STATE_CREATED,
        self::STATE_FAILED,
        self::STATE_INVALID,
    ];

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
                    $this->throwValidateException(self::FIELD_STATES);
                }
                $this->validateList((string) $state, self::FIELD_STATES, self::STATES);
            }
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
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->symbol) {
            $result[self::FIELD_SYMBOL] = $this->symbol;
        }
        if ($this->states) {
            $result[self::FIELD_STATES] = implode(',', $this->states);
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
