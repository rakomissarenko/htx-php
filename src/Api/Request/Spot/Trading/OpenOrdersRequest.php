<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class OpenOrdersRequest extends AbstractRequest
{
    private const FIELD_ACCOUNT_ID = 'account-id';
    private const FIELD_SIDE = 'side';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/openOrders';

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 500;

    private ?array $types = null;
    private ?string $from = null;
    private ?string $direct = null;
    private ?int $size = null;

    public function __construct(
        private string $accountId,
        private string $symbol,
        private string $side,
    ) {}

    public function setTypes(array $types): void
    {
        $this->types = $types;
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

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateList($this->side, self::FIELD_SIDE, EnumHelper::ORDER_SIDES);
        if ($this->types) {
            foreach ($this->types as $type) {
                if (!is_scalar($type)) {
                    $this->throwValidateException(FieldHelper::FIELD_TYPES);
                }
                $this->validateList((string) $type, FieldHelper::FIELD_TYPES, EnumHelper::ORDER_TYPES);
            }
        }
        if ($this->direct) {
            $this->validateList($this->direct, FieldHelper::FIELD_DIRECT, EnumHelper::DIRECTS);
        }
        if ($this->size) {
            $this->validateRange(
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
            self::FIELD_ACCOUNT_ID    => $this->accountId,
            FieldHelper::FIELD_SYMBOL => $this->symbol,
            self::FIELD_SIDE          => $this->side,
        ];
        if ($this->types) {
            $result[FieldHelper::FIELD_TYPES] = implode(',', $this->types);
        }
        if ($this->from) {
            $result[FieldHelper::FIELD_FROM] = $this->from;
        }
        if ($this->direct) {
            $result[FieldHelper::FIELD_DIRECT] = $this->direct;
        }
        if ($this->size) {
            $result[FieldHelper::FIELD_SIZE] = $this->size;
        }

        return $result;
    }
}
