<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Request\AbstractRequest;

class BalanceRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/account/accounts';

    public function __construct(private int $subUid)
    {}

    public function getPath(): string
    {
        return self::PATH . $this->subUid;
    }

    public function validate(): void
    {
    }

    public function toArray(): array
    {
        return [];
    }
}
