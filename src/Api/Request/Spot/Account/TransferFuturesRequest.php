<?php

namespace Feralonso\Htx\Api\Request\Spot\Account;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferFuturesRequest extends AbstractRequest
{
    protected const PATH = '/v1/futures/transfer';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $currency,
        private string $amount,
        private string $type,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateNotEmptyString($this->currency, FieldHelper::FIELD_CURRENCY);
        ValidateHelper::validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
        ValidateHelper::validateList($this->type, FieldHelper::FIELD_TYPE, EnumHelper::TRANSFER_FUTURES_TYPES);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_CURRENCY => $this->currency,
            FieldHelper::FIELD_AMOUNT   => $this->amount,
            FieldHelper::FIELD_TYPE     => $this->type,
        ];
    }
}
