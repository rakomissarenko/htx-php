<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class LimitRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/margin/limit';

    private const CURRENCIES_SIZE = 10;

    private ?array $currencies = null;

    public function setCurrencies(array $currencies): void
    {
        $this->currencies = $currencies;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->currencies) {
            ValidateHelper::validateArraySize($this->currencies, FieldHelper::FIELD_CURRENCY, self::CURRENCIES_SIZE);
            ValidateHelper::validateArrayScalar($this->currencies, FieldHelper::FIELD_CURRENCY);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->currencies) {
            $result[FieldHelper::FIELD_CURRENCY] = implode(',', $this->currencies);
        }

        return $result;
    }
}
