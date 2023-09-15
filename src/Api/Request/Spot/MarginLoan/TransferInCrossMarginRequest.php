<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferInCrossMarginRequest extends AbstractRequest
{
    private const FIELD_AMOUNT = 'amount';

    protected const PATH = '/v1/cross-margin/transfer-in';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $currency,
        private string $amount,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateNumeric($this->amount, self::FIELD_AMOUNT);
    }

    public function toArray(): array
    {
        return [
            self::FIELD_CURRENCY => $this->currency,
            self::FIELD_AMOUNT   => $this->amount,
        ];
    }
}
