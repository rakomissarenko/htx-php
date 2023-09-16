<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class AddressWithdrawRequest extends AbstractRequest
{
    private const FIELD_CHAIN = 'chain';
    private const FIELD_FROM_ID = 'fromId';
    private const FIELD_NOTE = 'note';

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
        if ($this->limit) {
            $this->validateRange(
                (string) $this->limit,
                FieldHelper::FIELD_LIMIT,
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
            FieldHelper::FIELD_CURRENCY => $this->currency,
        ];
        if ($this->chain) {
            $result[self::FIELD_CHAIN] = $this->chain;
        }
        if ($this->note) {
            $result[self::FIELD_NOTE] = $this->note;
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
