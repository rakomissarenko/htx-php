<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CancelBatchOpenOrdersRequest extends AbstractRequest
{
    private const FIELD_ACCOUNT_ID = 'account-id';
    private const FIELD_SIDE = 'side';
    private const FIELD_SIZE = 'size';
    private const FIELD_SYMBOL = 'symbol';
    private const FIELD_TYPES = 'types';

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
        if ($this->symbols) {
            if (count($this->symbols) > self::SYMBOLS_SIZE) {
                $this->throwValidateException(self::FIELD_SYMBOL);
            }
            foreach ($this->symbols as $symbol) {
                if (!is_scalar($symbol)) {
                    $this->throwValidateException(self::FIELD_SYMBOL);
                }
            }
        }
        if ($this->types) {
            foreach ($this->types as $type) {
                if (!is_scalar($type)) {
                    $this->throwValidateException(self::FIELD_TYPES);
                }
                $this->validateList((string) $type, self::FIELD_TYPES, EnumHelper::ORDER_TYPES);
            }
        }
        if ($this->side) {
            $this->validateList($this->side, self::FIELD_SIDE, EnumHelper::ORDER_SIDES);
        }
        if ($this->size) {
            $this->validateRange(
                (string) $this->size,
                self::FIELD_SIZE,
                (string) self::SIZE_MIN,
                (string) self::SIZE_MAX,
            );
        }
    }

    public function toArray(): array
    {
        $result = [
            self::FIELD_ACCOUNT_ID => $this->accountId,
        ];
        if ($this->symbols) {
            $result[self::FIELD_SYMBOL] = implode(',', $this->symbols);
        }
        if ($this->types) {
            $result[self::FIELD_TYPES] = implode(',', $this->types);
        }
        if ($this->side) {
            $result[self::FIELD_SIDE] = $this->side;
        }
        if ($this->size) {
            $result[self::FIELD_SIZE] = $this->size;
        }

        return $result;
    }
}
