<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CreateWithdrawRequest extends AbstractRequest
{
    private const FIELD_ADDR_TAG = 'addr-tag';
    private const FIELD_ADDRESS = 'address';
    private const FIELD_AMOUNT = 'amount';
    private const FIELD_CHAIN = 'chain';
    private const FIELD_FEE = 'fee';

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
        $this->validateNumeric($this->amount, self::FIELD_AMOUNT);
        if ($this->fee) {
            $this->validateNumeric($this->fee, self::FIELD_FEE);
        }
    }

    public function toArray(): array
    {
        $result = [
            self::FIELD_ADDRESS         => $this->address,
            FieldHelper::FIELD_CURRENCY => $this->currency,
            self::FIELD_AMOUNT          => $this->amount,
        ];
        if ($this->fee) {
            $result[self::FIELD_FEE] = $this->fee;
        }
        if ($this->chain) {
            $result[self::FIELD_CHAIN] = $this->chain;
        }
        if ($this->addrTag) {
            $result[self::FIELD_ADDR_TAG] = $this->addrTag;
        }
        if ($this->clientOrderId) {
            $result[FieldHelper::FIELD_CLIENT_ORDER_ID] = $this->clientOrderId;
        }

        return $result;
    }
}
