<?php

namespace Feralonso\Htx\Api\Request\Spot\Account;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class LedgerRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/account/ledger';

    private const TIME_MIN = 180 * 24 * 3600 * 1000;
    private const TIME_RANGE_MAX = 10 * 24 * 3600 * 1000;

    private const LIMIT_MIN = 1;
    private const LIMIT_MAX = 500;

    private ?string $accountId = null;
    private ?string $currency = null;
    private ?array $transactTypes = null;
    private ?string $startTime = null;
    private ?string $endTime = null;
    private ?string $sort = null;
    private ?int $limit = null;
    private ?string $fromId = null;

    public function setAccountId(?string $accountId): void
    {
        $this->accountId = $accountId;
    }

    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    public function setTransactTypes(?array $transactTypes): void
    {
        $this->transactTypes = $transactTypes;
    }

    public function setStartTime(?string $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function setEndTime(?string $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function setSort(?string $sort): void
    {
        $this->sort = $sort;
    }

    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    public function setFromId(?string $fromId): void
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
                    $this->throwValidateException(FieldHelper::FIELD_TRANSACT_TYPES);
                }
                ValidateHelper::validateList((string) $type, FieldHelper::FIELD_TRANSACT_TYPES, EnumHelper::TRANSFER_LEDGER_TYPES);
            }
        }
        if ($this->startTime) {
            ValidateHelper::validateInteger($this->startTime, FieldHelper::FIELD_START_TIME);
            ValidateHelper::validateRange(
                $this->startTime,
                FieldHelper::FIELD_START_TIME,
                (string) (microtime(true) * 1000 - self::TIME_MIN),
                (string) (microtime(true) * 1000),
            );
        }
        if ($this->endTime) {
            ValidateHelper::validateInteger($this->endTime, FieldHelper::FIELD_END_TIME);
            if ($this->startTime) {
                ValidateHelper::validateRange(
                    $this->startTime,
                    FieldHelper::FIELD_START_TIME,
                    (string) $this->startTime,
                    (string) ($this->startTime + self::TIME_RANGE_MAX),
                );
            } else {
                ValidateHelper::validateRange(
                    $this->endTime,
                    FieldHelper::FIELD_END_TIME,
                    (string) (microtime(true) * 1000 - self::TIME_MIN + self::TIME_RANGE_MAX),
                    (string) (microtime(true) * 1000),
                );
            }
        }
        if ($this->sort) {
            ValidateHelper::validateList($this->sort, FieldHelper::FIELD_SORT, EnumHelper::SORTS);
        }
        if ($this->limit) {
            ValidateHelper::validateRange((string) $this->limit, FieldHelper::FIELD_LIMIT, (string) self::LIMIT_MIN, (string) self::LIMIT_MAX);
        }
        if ($this->fromId) {
            ValidateHelper::validateInteger($this->fromId, FieldHelper::FIELD_FROM_ID);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->accountId) {
            $result[FieldHelper::FIELD_ACCOUNT_ID] = $this->accountId;
        }
        if ($this->currency) {
            $result[FieldHelper::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->transactTypes) {
            $result[FieldHelper::FIELD_TRANSACT_TYPES] = implode(',', $this->transactTypes);
        }
        if ($this->startTime) {
            $result[FieldHelper::FIELD_START_TIME] = $this->startTime;
        }
        if ($this->endTime) {
            $result[FieldHelper::FIELD_END_TIME] = $this->endTime;
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
