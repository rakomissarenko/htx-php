<?php

namespace Feralonso\Htx\Api\Request\Spot\Common;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class SymbolsRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/settings/common/symbols';

    private ?string $ts = null;

    public function setTs(string $ts): void
    {
        $this->ts = $ts;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->ts) {
            $this->validateInteger($this->ts, self::FIELD_TS);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->ts) {
            $result[self::FIELD_TS] = $this->ts;
        }

        return $result;
    }
}
