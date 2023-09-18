<?php

namespace Feralonso\Htx\Api\Request\Spot\Account;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class HistoryRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/account/history';

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
                    $this->throwValidateException(FieldHelper::FIELD_TRANSACT_TYPES_HYPHEN);
                }
                ValidateHelper::validateList((string) $type, FieldHelper::FIELD_TRANSACT_TYPES_HYPHEN, EnumHelper::TRANSACTION_TYPES);
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
        if ($this->sort) {
            ValidateHelper::validateList($this->sort, FieldHelper::FIELD_SORT, EnumHelper::SORTS);
        }
        if ($this->size) {
            $this->validateRange($this->size, FieldHelper::FIELD_SIZE, (string) self::SIZE_MIN, (string) self::SIZE_MAX);
        }
        if ($this->fromId) {
            $this->validateInteger($this->fromId, FieldHelper::FIELD_FROM_ID_HYPHEN);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->accountId) {
            $result[FieldHelper::FIELD_ACCOUNT_ID_HYPHEN] = $this->accountId;
        }
        if ($this->currency) {
            $result[FieldHelper::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->transactTypes) {
            $result[FieldHelper::FIELD_TRANSACT_TYPES_HYPHEN] = implode(',', $this->transactTypes);
        }
        if ($this->startTime) {
            $result[FieldHelper::FIELD_START_TIME_HYPHEN] = $this->startTime;
        }
        if ($this->endTime) {
            $result[FieldHelper::FIELD_END_TIME_HYPHEN] = $this->endTime;
        }
        if ($this->sort) {
            $result[FieldHelper::FIELD_SORT] = $this->sort;
        }
        if ($this->size) {
            $result[FieldHelper::FIELD_SIZE] = $this->size;
        }
        if ($this->fromId) {
            $result[FieldHelper::FIELD_FROM_ID_HYPHEN] = $this->fromId;
        }

        return $result;
    }
}
