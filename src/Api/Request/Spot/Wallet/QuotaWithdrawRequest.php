<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Request\AbstractRequest;

class QuotaWithdrawRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/account/withdraw/quota';

    public function __construct(private string $currency)
    {}

    public function toArray(): array
    {
        return [
            self::FIELD_CURRENCY => $this->currency,
        ];
    }
}
