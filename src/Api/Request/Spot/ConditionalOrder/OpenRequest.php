<?php

namespace Feralonso\Htx\Api\Request\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class OpenRequest extends AbstractRequest
{
    private const FIELD_ORDER_SIDE = 'orderSide';
    private const FIELD_ORDER_TYPE = 'orderType';
    private const FIELD_FROM_ID = 'fromId';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/algo-orders/opening';

    private const ORDER_TYPE_LIMIT = 'limit';
    private const ORDER_TYPE_MARKET = 'market';
    private const ORDER_TYPES = [
        self::ORDER_TYPE_LIMIT,
        self::ORDER_TYPE_MARKET,
    ];

    private const LIMIT_MIN = 1;
    private const LIMIT_MAX = 500;

    private ?string $sort = null;
    private ?int $limit = null;
    private ?string $fromId = null;

    public function __construct(
        private int $accountId,
        private string $symbol,
        private string $orderSide,
        private string $orderType,
    ) {}

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
        $this->validateList($this->orderSide, self::FIELD_ORDER_SIDE, EnumHelper::ORDER_SIDES);
        $this->validateList($this->orderType, self::FIELD_ORDER_TYPE, self::ORDER_TYPES);
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
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_ACCOUNT_ID => $this->accountId,
            FieldHelper::FIELD_SYMBOL     => $this->symbol,
            self::FIELD_ORDER_SIDE        => $this->orderSide,
            self::FIELD_ORDER_TYPE        => $this->orderType,
        ];
        if ($this->sort) {
            $result[FieldHelper::FIELD_SORT] = $this->sort;
        }
        if ($this->limit) {
            $result[FieldHelper::FIELD_LIMIT] = $this->limit;
        }
        if ($this->fromId) {
            $result[self::FIELD_FROM_ID] = $this->fromId;
        }

        return $result;
    }
}
