<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CreateWithdrawRequest extends AbstractRequest
{
    protected const PATH = '/v1/dw/withdraw/api/create';
    protected const PERMISSION = self::PERMISSION_WITHDRAW;

    private ?string $fee = null;
    private ?string $chain = null;
    private ?string $addrTag = null;
    private ?string $clientOrderId = null;

    public function __construct(
        private string $address,
        private string $currency,
        private string $amount,
    ) {}

    public function setFee(string $fee): void
    {
        $this->fee = $fee;
    }

    public function setChain(string $chain): void
    {
        $this->chain = $chain;
    }

    public function setAddrTag(string $addrTag): void
    {
        $this->addrTag = $addrTag;
    }

    public function setClientOrderId(string $clientOrderId): void
    {
        $this->clientOrderId = $clientOrderId;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateNotEmptyString($this->address, FieldHelper::FIELD_ADDRESS);
        ValidateHelper::validateNotEmptyString($this->currency, FieldHelper::FIELD_CURRENCY);
        ValidateHelper::validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
        if ($this->fee) {
            ValidateHelper::validateNumeric($this->fee, FieldHelper::FIELD_FEE);
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_ADDRESS  => $this->address,
            FieldHelper::FIELD_CURRENCY => $this->currency,
            FieldHelper::FIELD_AMOUNT   => $this->amount,
        ];
        if ($this->fee) {
            $result[FieldHelper::FIELD_FEE] = $this->fee;
        }
        if ($this->chain) {
            $result[FieldHelper::FIELD_CHAIN] = $this->chain;
        }
        if ($this->addrTag) {
            $result[FieldHelper::FIELD_ADDR_TAG_HYPHEN] = $this->addrTag;
        }
        if ($this->clientOrderId) {
            $result[FieldHelper::FIELD_CLIENT_ORDER_ID_HYPHEN] = $this->clientOrderId;
        }

        return $result;
    }
}
