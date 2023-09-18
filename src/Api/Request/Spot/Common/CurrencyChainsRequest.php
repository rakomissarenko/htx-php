<?php

namespace Feralonso\Htx\Api\Request\Spot\Common;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;

class CurrencyChainsRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/reference/currencies';

    private ?string $currency = null;
    private ?bool $authorizedUser = null;

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function setAuthorizedUser(bool $authorizedUser): void
    {
        $this->authorizedUser = $authorizedUser;
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->currency) {
            $result[FieldHelper::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->authorizedUser !== null) {
            $result[FieldHelper::FIELD_AUTHORIZED_USER] = $this->authorizedUser;
        }

        return $result;
    }
}
