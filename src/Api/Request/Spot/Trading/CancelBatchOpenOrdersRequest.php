<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CancelBatchOpenOrdersRequest extends AbstractRequest
{
    protected const PATH = '/v1/order/orders/batchCancelOpenOrders';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const SYMBOLS_SIZE = 10;

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 100;

    private ?array $symbols = null;
    private ?array $types = null;
    private ?string $side = null;
    private ?int $size = null;

    public function __construct(private string $accountId) {}

    public function setSymbols(array $symbols): void
    {
        $this->symbols = $symbols;
    }

    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    public function setSide(string $side): void
    {
        $this->side = $side;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateNotEmptyString($this->accountId, FieldHelper::FIELD_ACCOUNT_ID_HYPHEN);
        if ($this->symbols) {
            ValidateHelper::validateArraySize($this->symbols, FieldHelper::FIELD_SYMBOL, self::SYMBOLS_SIZE);
            ValidateHelper::validateArrayScalar($this->symbols, FieldHelper::FIELD_SYMBOL);
        }
        if ($this->types) {
            ValidateHelper::validateArrayScalar($this->types, FieldHelper::FIELD_TYPES);
            foreach ($this->types as $type) {
                ValidateHelper::validateList((string) $type, FieldHelper::FIELD_TYPES, EnumHelper::ORDER_TYPES);
            }
        }
        if ($this->side) {
            ValidateHelper::validateList($this->side, FieldHelper::FIELD_SIDE, EnumHelper::ORDER_SIDES);
        }
        if ($this->size) {
            ValidateHelper::validateRange(
                (string) $this->size,
                FieldHelper::FIELD_SIZE,
                (string) self::SIZE_MIN,
                (string) self::SIZE_MAX,
            );
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_ACCOUNT_ID_HYPHEN => $this->accountId,
        ];
        if ($this->symbols) {
            $result[FieldHelper::FIELD_SYMBOL] = implode(',', $this->symbols);
        }
        if ($this->types) {
            $result[FieldHelper::FIELD_TYPES] = implode(',', $this->types);
        }
        if ($this->side) {
            $result[FieldHelper::FIELD_SIDE] = $this->side;
        }
        if ($this->size) {
            $result[FieldHelper::FIELD_SIZE] = $this->size;
        }

        return $result;
    }
}
