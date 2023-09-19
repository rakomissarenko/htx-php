<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class LoanInfoRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/margin/loan-info';

    public function __construct(private array $symbols) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateNotEmptyArray($this->symbols, FieldHelper::FIELD_SYMBOLS);
        ValidateHelper::validateArrayScalar($this->symbols, FieldHelper::FIELD_SYMBOLS);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SYMBOLS => implode(',', $this->symbols),
        ];
    }
}
