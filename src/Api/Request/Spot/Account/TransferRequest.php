<?php

namespace Feralonso\Htx\Api\Request\Spot\Account;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferRequest extends AbstractRequest
{
    protected const PATH = '/v1/account/transfer';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $fromUser,
        private string $fromAccountType,
        private string $fromAccount,
        private string $toUser,
        private string $toAccountType,
        private string $toAccount,
        private string $currency,
        private string $amount,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateInteger($this->fromUser, FieldHelper::FIELD_FROM_USER_HYPHEN);
        $this->validateInteger($this->fromAccount, FieldHelper::FIELD_FROM_ACCOUNT_HYPHEN);
        $this->validateInteger($this->toUser, FieldHelper::FIELD_TO_USER_HYPHEN);
        $this->validateInteger($this->toAccount, FieldHelper::FIELD_TO_ACCOUNT_HYPHEN);
        $this->validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_FROM_USER_HYPHEN         => $this->fromUser,
            FieldHelper::FIELD_FROM_ACCOUNT_TYPE_HYPHEN => $this->fromAccountType,
            FieldHelper::FIELD_FROM_ACCOUNT_HYPHEN      => $this->fromAccount,
            FieldHelper::FIELD_TO_USER_HYPHEN           => $this->toUser,
            FieldHelper::FIELD_TO_ACCOUNT_TYPE_HYPHEN   => $this->toAccountType,
            FieldHelper::FIELD_TO_ACCOUNT_HYPHEN        => $this->toAccount,
            FieldHelper::FIELD_CURRENCY                 => $this->currency,
            FieldHelper::FIELD_AMOUNT                   => $this->amount,
        ];
    }
}
