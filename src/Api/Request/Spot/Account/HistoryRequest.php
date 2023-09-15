<?php

namespace Feralonso\Htx\Api\Request\Spot\Account;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class HistoryRequest extends AbstractRequest
{
    private const FIELD_ACCOUNT_ID = 'account-id';
    private const FIELD_TRANSACT_TYPES = 'transact-types';
    private const FIELD_START_TIME = 'start-time';
    private const FIELD_END_TIME = 'end-time';
    private const FIELD_SORT = 'sort';
    private const FIELD_SIZE = 'size';
    private const FIELD_FROM_ID = 'from-id';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/account/history';

    private const TYPE_CREDIT = 'credit';
    private const TYPE_DEPOSIT = 'deposit';
    private const TYPE_ETF = 'etf';
    private const TYPE_EXCHANGE = 'exchange';
    private const TYPE_FEE = 'fee-deduction';
    private const TYPE_INTEREST = 'interest';
    private const TYPE_LIQUIDATION = 'liquidation';
    private const TYPE_OTHER_TYPES = 'other-types';
    private const TYPE_REBATE = 'rebate';
    private const TYPE_TRADE = 'trade';
    private const TYPE_TRANSACT_FEE = 'transact-fee';
    private const TYPE_TRANSFER = 'transfer';
    private const TYPE_WITHDRAW = 'withdraw';
    private const TYPE_WITHDRAW_FEE = 'withdraw-fee';
    private const TYPES = [
        self::TYPE_CREDIT,
        self::TYPE_DEPOSIT,
        self::TYPE_ETF,
        self::TYPE_EXCHANGE,
        self::TYPE_FEE,
        self::TYPE_INTEREST,
        self::TYPE_LIQUIDATION,
        self::TYPE_OTHER_TYPES,
        self::TYPE_REBATE,
        self::TYPE_TRADE,
        self::TYPE_TRANSACT_FEE,
        self::TYPE_TRANSFER,
        self::TYPE_WITHDRAW,
        self::TYPE_WITHDRAW_FEE,
    ];

    private const TIME_MIN = 30 * 24 * 3600 * 1000;
    private const TIME_RANGE_MAX = 3600 * 1000;

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 500;

    private ?string $accountId = null;
    private ?string $currency = null;
    private ?array $transactTypes = null;
    private ?string $startTime = null;
    private ?string $endTime = null;
    private ?string $sort = null;
    private ?int $size = null;
    private ?string $fromId = null;

    public function setAccountId(string $accountId): void
    {
        $this->accountId = $accountId;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function setTransactTypes(array $transactTypes): void
    {
        $this->transactTypes = $transactTypes;
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

    public function setSize(int $size): void
    {
        $this->size = $size;
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
        if ($this->transactTypes) {
            foreach ($this->transactTypes as $type) {
                if (!is_scalar($type)) {
                    $this->throwValidateException(self::FIELD_TRANSACT_TYPES);
                }
                $this->validateList((string) $type, self::FIELD_TRANSACT_TYPES, self::TYPES);
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
        if ($this->sort) {
            $this->validateList($this->sort, self::FIELD_SORT, EnumHelper::SORTS);
        }
        if ($this->size) {
            $this->validateRange($this->size, self::FIELD_SIZE, (string) self::SIZE_MIN, (string) self::SIZE_MAX);
        }
        if ($this->fromId) {
            $this->validateInteger($this->fromId, self::FIELD_FROM_ID);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->accountId) {
            $result[self::FIELD_ACCOUNT_ID] = $this->accountId;
        }
        if ($this->currency) {
            $result[self::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->transactTypes) {
            $result[self::FIELD_TRANSACT_TYPES] = implode(',', $this->transactTypes);
        }
        if ($this->startTime) {
            $result[self::FIELD_START_TIME] = $this->startTime;
        }
        if ($this->endTime) {
            $result[self::FIELD_END_TIME] = $this->endTime;
        }
        if ($this->sort) {
            $result[self::FIELD_SORT] = $this->sort;
        }
        if ($this->size) {
            $result[self::FIELD_SIZE] = $this->size;
        }
        if ($this->fromId) {
            $result[self::FIELD_FROM_ID] = $this->fromId;
        }

        return $result;
    }
}
