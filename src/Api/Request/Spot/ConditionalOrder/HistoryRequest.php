<?php

namespace Feralonso\Htx\Api\Request\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class HistoryRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/algo-orders/history';

    private const LIMIT_MIN = 1;
    private const LIMIT_MAX = 500;

    private ?string $orderSide = null;
    private ?string $orderType = null;
    private ?string $orderStatus = null;
    private ?string $startTime = null;
    private ?string $endTime = null;
    private ?string $sort = null;
    private ?int $limit = null;
    private ?string $fromId = null;

    public function __construct(
        private int $accountId,
        private string $symbol,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->orderSide) {
            ValidateHelper::validateList($this->orderSide, FieldHelper::FIELD_ORDER_SIDE, EnumHelper::ORDER_SIDES);
        }
        if ($this->orderType) {
            ValidateHelper::validateList($this->orderType, FieldHelper::FIELD_ORDER_TYPE, EnumHelper::ORDER_BID_TYPES);
        }
        if ($this->orderStatus) {
            ValidateHelper::validateList($this->orderStatus, FieldHelper::FIELD_ORDER_STATUS, EnumHelper::ORDER_STATUSES);
        }
        if ($this->startTime) {
            ValidateHelper::validateInteger($this->startTime, FieldHelper::FIELD_START_TIME);
        }
        if ($this->endTime) {
            ValidateHelper::validateInteger($this->endTime, FieldHelper::FIELD_END_TIME);
            if ($this->startTime && $this->startTime > $this->endTime) {
                $this->throwValidateException(FieldHelper::FIELD_END_TIME);
            }
        }
        if ($this->sort) {
            ValidateHelper::validateList($this->sort, FieldHelper::FIELD_SORT, EnumHelper::SORTS);
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
            ValidateHelper::validateInteger($this->fromId, FieldHelper::FIELD_FROM_ID);
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_ACCOUNT_ID => $this->accountId,
            FieldHelper::FIELD_SYMBOL     => $this->symbol,
        ];
        if ($this->orderSide) {
            $result[FieldHelper::FIELD_ORDER_SIDE] = $this->orderSide;
        }
        if ($this->orderType) {
            $result[FieldHelper::FIELD_ORDER_TYPE] = $this->orderType;
        }
        if ($this->orderStatus) {
            $result[FieldHelper::FIELD_ORDER_STATUS] = $this->orderStatus;
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
