<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferInMarginRequest extends AbstractRequest
{
    protected const PATH = '/v1/dw/transfer-in/margin';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $symbol,
        private string $currency,
        private string $amount,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SYMBOL   => $this->symbol,
            FieldHelper::FIELD_CURRENCY => $this->currency,
            FieldHelper::FIELD_AMOUNT   => $this->amount,
        ];
    }
}
