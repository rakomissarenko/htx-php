<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SearchRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/query/deposit-withdraw';

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 500;

    private ?string $currency = null;
    private ?string $from = null;
    private ?int $size = null;
    private ?string $direct = null;

    public function __construct(private string $type) {}

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    public function setDirect(string $direct): void
    {
        $this->direct = $direct;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateList($this->type, FieldHelper::FIELD_TYPE, EnumHelper::WALLET_TYPES);
        if ($this->size) {
            ValidateHelper::validateRange(
                (string) $this->size,
                FieldHelper::FIELD_SIZE,
                (string) self::SIZE_MIN,
                (string) self::SIZE_MAX,
            );
        }
        if ($this->direct) {
            ValidateHelper::validateList($this->direct, FieldHelper::FIELD_DIRECT, EnumHelper::DIRECTS);
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_TYPE => $this->type,
        ];
        if ($this->currency) {
            $result[FieldHelper::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->from) {
            $result[FieldHelper::FIELD_FROM] = $this->from;
        }
        if ($this->size) {
            $result[FieldHelper::FIELD_SIZE] = $this->size;
        }
        if ($this->direct) {
            $result[FieldHelper::FIELD_DIRECT] = $this->direct;
        }

        return $result;
    }
}
