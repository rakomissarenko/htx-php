<?php

namespace Feralonso\Htx\Api\Request\Spot\Common;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SymbolsMarketRequest extends AbstractRequest
{
    private const FIELD_SYMBOLS = 'symbols';

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
                    $this->throwValidateException(self::FIELD_SYMBOLS);
                }
            }
        }
        if ($this->ts) {
            $this->validateInteger($this->ts, self::FIELD_TS);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->symbols) {
            $result[self::FIELD_SYMBOLS] = implode(',', $this->symbols);
        }
        if ($this->ts) {
            $result[self::FIELD_TS] = $this->ts;
        }

        return $result;
    }
}
