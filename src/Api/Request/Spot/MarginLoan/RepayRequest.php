<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class RepayRequest extends AbstractRequest
{
    protected const PATH = '/v2/account/repayment';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $accountId,
        private string $currency,
        private string $amount,
        private string $transactId,
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
            FieldHelper::FIELD_ACCOUNT_ID  => $this->accountId,
            FieldHelper::FIELD_CURRENCY    => $this->currency,
            FieldHelper::FIELD_AMOUNT      => $this->amount,
            FieldHelper::FIELD_TRANSACT_ID => $this->transactId,
        ];
    }
}
