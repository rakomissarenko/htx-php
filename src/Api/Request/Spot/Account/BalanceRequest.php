<?php

namespace Feralonso\Htx\Api\Request\Spot\Account;

use Feralonso\Htx\Api\Request\AbstractRequest;

class BalanceRequest extends AbstractRequest
{
    private const FIELD_ACCOUNT_ID = 'account-id';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/account/accounts/';
    private const PATH_AFTER = '/balance';

    public function __construct(private string $accountId)
    {}

    public function getPath(): string
    {
        return self::PATH . $this->accountId . self::PATH_AFTER;
    }

    public function toArray(): array
    {
        return [
            self::FIELD_ACCOUNT_ID => $this->accountId,
        ];
    }
}
