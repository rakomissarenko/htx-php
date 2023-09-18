<?php

namespace Feralonso\Htx\Api\Request\Spot\Account;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferFuturesRequest extends AbstractRequest
{
    protected const PATH = '/v1/futures/transfer';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const TYPE_FUTURES_TO_PRO = 'futures-to-pro';
    private const TYPE_PRO_TO_FUTURES = 'pro-to-futures';
    private const TYPES = [
        self::TYPE_FUTURES_TO_PRO,
        self::TYPE_PRO_TO_FUTURES,
    ];

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
        $this->validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
        $this->validateList($this->type, FieldHelper::FIELD_TYPE, self::TYPES);
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
