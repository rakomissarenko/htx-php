<?php

namespace Feralonso\Htx\Api\Request\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class HistoryRequest extends AbstractRequest
{
    private const FIELD_END_TIME = 'endTime';
    private const FIELD_FROM_ID = 'fromId';
    private const FIELD_LIMIT = 'limit';
    private const FIELD_ORDER_SIDE = 'orderSide';
    private const FIELD_ORDER_STATUS = 'orderStatus';
    private const FIELD_ORDER_TYPE = 'orderType';
    private const FIELD_SORT = 'sort';
    private const FIELD_START_TIME = 'startTime';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/algo-orders/history';

    private const ORDER_TYPE_LIMIT = 'limit';
    private const ORDER_TYPE_MARKET = 'market';
    private const ORDER_TYPES = [
        self::ORDER_TYPE_LIMIT,
        self::ORDER_TYPE_MARKET,
    ];

    private const ORDER_STATUS_CANCELED = 'canceled';
    private const ORDER_STATUS_REJECTED = 'rejected';
    private const ORDER_STATUS_TRIGGERED = 'triggered';
    private const ORDER_STATUSES = [
        self::ORDER_STATUS_CANCELED,
        self::ORDER_STATUS_REJECTED,
        self::ORDER_STATUS_TRIGGERED,
    ];

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
            $this->validateList($this->orderSide, self::FIELD_ORDER_SIDE, EnumHelper::ORDER_SIDES);
        }
        if ($this->orderType) {
            $this->validateList($this->orderType, self::FIELD_ORDER_TYPE, self::ORDER_TYPES);
        }
        if ($this->orderStatus) {
            $this->validateList($this->orderStatus, self::FIELD_ORDER_STATUS, self::ORDER_STATUSES);
        }
        if ($this->startTime) {
            $this->validateInteger($this->startTime, self::FIELD_START_TIME);
        }
        if ($this->endTime) {
            $this->validateInteger($this->endTime, self::FIELD_END_TIME);
            if ($this->startTime && $this->startTime > $this->endTime) {
                $this->throwValidateException(self::FIELD_END_TIME);
            }
        }
        if ($this->sort) {
            $this->validateList($this->sort, self::FIELD_SORT, EnumHelper::SORTS);
        }
        if ($this->limit) {
            $this->validateRange(
                (string) $this->limit,
                self::FIELD_LIMIT,
                (string) self::LIMIT_MIN,
                (string) self::LIMIT_MAX,
            );
        }
        if ($this->fromId) {
            $this->validateInteger($this->fromId, self::FIELD_FROM_ID);
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_ACCOUNT_ID => $this->accountId,
            FieldHelper::FIELD_SYMBOL     => $this->symbol,
        ];
        if ($this->orderSide) {
            $result[self::FIELD_ORDER_SIDE] = $this->orderSide;
        }
        if ($this->orderType) {
            $result[self::FIELD_ORDER_TYPE] = $this->orderType;
        }
        if ($this->orderStatus) {
            $result[self::FIELD_ORDER_STATUS] = $this->orderStatus;
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
        if ($this->limit) {
            $result[self::FIELD_LIMIT] = $this->limit;
        }
        if ($this->fromId) {
            $result[self::FIELD_FROM_ID] = $this->fromId;
        }

        return $result;
    }
}
