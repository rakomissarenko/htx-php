<?php

namespace Feralonso\Htx\Api\Request\Spot\Account;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferRequest extends AbstractRequest
{
    private const FIELD_AMOUNT = 'amount';
    private const FIELD_FROM_USER = 'from-user';
    private const FIELD_FROM_ACCOUNT_TYPE = 'from-account-type';
    private const FIELD_FROM_ACCOUNT = 'from-account';
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
        $this->validateInteger($this->fromUser, self::FIELD_FROM_USER);
        $this->validateInteger($this->fromAccount, self::FIELD_FROM_ACCOUNT);
        $this->validateInteger($this->toUser, self::FIELD_TO_USER);
        $this->validateInteger($this->toAccount, self::FIELD_TO_ACCOUNT);
        $this->validateNumeric($this->amount, self::FIELD_AMOUNT);
    }

    public function toArray(): array
    {
        return [
            self::FIELD_FROM_USER         => $this->fromUser,
            self::FIELD_FROM_ACCOUNT_TYPE => $this->fromAccountType,
            self::FIELD_FROM_ACCOUNT      => $this->fromAccount,
            self::FIELD_TO_USER           => $this->toUser,
            self::FIELD_TO_ACCOUNT_TYPE   => $this->toAccountType,
            self::FIELD_TO_ACCOUNT        => $this->toAccount,
            FieldHelper::FIELD_CURRENCY   => $this->currency,
            self::FIELD_AMOUNT            => $this->amount,
        ];
    }
}
