<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;

class AddressDepositRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/account/deposit/address';

    public function __construct(private string $currency)
    {}

    public function validate(): void
    {
        ValidateHelper::validateNotEmptyString($this->currency, FieldHelper::FIELD_CURRENCY);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_CURRENCY => $this->currency,
        ];
    }
}
