<?php

namespace Feralonso\Htx\Api\Request\Spot\Account;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferRequest extends AbstractRequest
{
    private const FIELD_TO_USER = 'to-user';
    private const FIELD_TO_ACCOUNT_TYPE = 'to-account-type';
    private const FIELD_TO_ACCOUNT = 'to-account';

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
        $this->validateInteger($this->toUser, self::FIELD_TO_USER);
        $this->validateInteger($this->toAccount, self::FIELD_TO_ACCOUNT);
        $this->validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_FROM_USER_HYPHEN         => $this->fromUser,
            FieldHelper::FIELD_FROM_ACCOUNT_TYPE_HYPHEN => $this->fromAccountType,
            FieldHelper::FIELD_FROM_ACCOUNT_HYPHEN      => $this->fromAccount,
            self::FIELD_TO_USER                         => $this->toUser,
            self::FIELD_TO_ACCOUNT_TYPE                 => $this->toAccountType,
            self::FIELD_TO_ACCOUNT                      => $this->toAccount,
            FieldHelper::FIELD_CURRENCY                 => $this->currency,
            FieldHelper::FIELD_AMOUNT                   => $this->amount,
        ];
    }
}
