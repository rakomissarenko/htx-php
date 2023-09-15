<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SearchRequest extends AbstractRequest
{
    private const FIELD_DIRECT = 'direct';
    private const FIELD_FROM = 'from';
    private const FIELD_SIZE = 'size';
    private const FIELD_TYPE = 'type';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/query/deposit-withdraw';

    private const TYPE_DEPOSIT = 'deposit';
    private const TYPE_WITHDRAW = 'withdraw';
    private const TYPES = [
        self::TYPE_DEPOSIT,
        self::TYPE_WITHDRAW,
    ];

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 500;

    private const DIRECT_PREV = 'prev';
    private const DIRECT_NEXT = 'next';
    private const DIRECTS = [
        self::DIRECT_PREV,
        self::DIRECT_NEXT,
    ];

    private ?string $currency = null;
    private ?string $type = null;
    private ?string $from = null;
    private ?int $size = null;
    private ?string $direct = null;

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
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
        if ($this->type) {
            $this->validateList($this->type, self::FIELD_TYPE, self::TYPES);
        }
        if ($this->size) {
            $this->validateRange(
                (string) $this->size,
                self::FIELD_SIZE,
                (string) self::SIZE_MIN,
                (string) self::SIZE_MAX,
            );
        }
        if ($this->direct) {
            $this->validateList($this->direct, self::FIELD_DIRECT, self::DIRECTS);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->currency) {
            $result[self::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->type) {
            $result[self::FIELD_TYPE] = $this->type;
        }
        if ($this->from) {
            $result[self::FIELD_FROM] = $this->from;
        }
        if ($this->size) {
            $result[self::FIELD_SIZE] = $this->size;
        }
        if ($this->direct) {
            $result[self::FIELD_DIRECT] = $this->direct;
        }

        return $result;
    }
}
