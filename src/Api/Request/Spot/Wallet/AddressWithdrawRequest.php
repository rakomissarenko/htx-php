<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class AddressWithdrawRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/account/withdraw/address';

    private const LIMIT_MIN = 1;
    private const LIMIT_MAX = 500;

    private ?string $chain = null;
    private ?string $note = null;
    private ?int $limit = null;
    private ?string $fromId = null;

    public function __construct(private string $currency)
    {}

    public function setChain(string $chain): void
    {
        $this->chain = $chain;
    }

    public function setNote(string $note): void
    {
        $this->note = $note;
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
        ValidateHelper::validateNotEmptyString($this->currency, FieldHelper::FIELD_CURRENCY);
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
            FieldHelper::FIELD_CURRENCY => $this->currency,
        ];
        if ($this->chain) {
            $result[FieldHelper::FIELD_CHAIN] = $this->chain;
        }
        if ($this->note) {
            $result[FieldHelper::FIELD_NOTE] = $this->note;
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
