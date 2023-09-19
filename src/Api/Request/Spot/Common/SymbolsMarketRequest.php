<?php

namespace Feralonso\Htx\Api\Request\Spot\Common;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SymbolsMarketRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/settings/common/market-symbols';

    private ?array $symbols = null;
    private ?string $ts = null;

    public function setSymbols(array $symbols): void
    {
        $this->symbols = $symbols;
    }

    public function setTs(string $ts): void
    {
        $this->ts = $ts;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->symbols) {
            foreach ($this->symbols as $symbol) {
                if (!is_scalar($symbol)) {
                    $this->throwValidateException(FieldHelper::FIELD_SYMBOLS);
                }
            }
        }
        if ($this->ts) {
            ValidateHelper::validateInteger($this->ts, FieldHelper::FIELD_TS);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->symbols) {
            $result[FieldHelper::FIELD_SYMBOLS] = implode(',', $this->symbols);
        }
        if ($this->ts) {
            $result[FieldHelper::FIELD_TS] = $this->ts;
        }

        return $result;
    }
}
