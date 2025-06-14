<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class QueryDepositRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/sub-user/query-deposit';

    private const TIME_MIN = 30 * 24 * 3600 * 1000;

    private const LIMIT_MIN = 1;
    private const LIMIT_MAX = 500;

    private ?string $startTime = null;
    private ?string $endTime = null;
    private ?string $sort = null;
    private ?int $limit = null;
    private ?string $fromId = null;

    public function __construct(
        private string $subUid,
        private string $currency,
    ) {}

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
        ValidateHelper::validateNotEmptyString($this->subUid, FieldHelper::FIELD_SUB_UID);
        ValidateHelper::validateInteger($this->subUid, FieldHelper::FIELD_SUB_UID);
        ValidateHelper::validateNotEmptyString($this->currency, FieldHelper::FIELD_CURRENCY);
        if ($this->startTime) {
            ValidateHelper::validateInteger($this->startTime, FieldHelper::FIELD_START_TIME);
            $startTimeMax = $this->endTime ?: microtime(true) * 1000;
            ValidateHelper::validateRange(
                $this->startTime,
                FieldHelper::FIELD_START_TIME,
                (string) ($startTimeMax - self::TIME_MIN),
                (string) $startTimeMax,
            );
        }
        if ($this->endTime) {
            ValidateHelper::validateInteger($this->endTime, FieldHelper::FIELD_END_TIME);
            if ($this->startTime && $this->startTime > $this->endTime) {
                ValidateHelper::throwValidateException(FieldHelper::FIELD_END_TIME);
            }
        }
        if ($this->sort) {
            ValidateHelper::validateList($this->sort, FieldHelper::FIELD_SORT, EnumHelper::SORTS);
        }
        if ($this->limit) {
            ValidateHelper::validateRange(
                (string) $this->limit,
                FieldHelper::FIELD_LIMIT,
                (string) self::LIMIT_MIN,
                (string) self::LIMIT_MAX,
            );
        }
        if ($this->fromId) {
            ValidateHelper::validateInteger($this->fromId, FieldHelper::FIELD_FROM_ID);
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_SUB_UID  => $this->subUid,
            FieldHelper::FIELD_CURRENCY => $this->currency,
        ];
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
