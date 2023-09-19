<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferInCrossMarginRequest extends AbstractRequest
{
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
        ValidateHelper::validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_CURRENCY => $this->currency,
            FieldHelper::FIELD_AMOUNT   => $this->amount,
        ];
    }
}
