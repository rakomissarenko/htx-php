<?php

namespace Feralonso\Htx\Api\Request\Spot\Common;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CurrenciesSettingsRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/settings/common/currencys';

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
            $this->validateInteger($this->ts, FieldHelper::FIELD_TS);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->ts) {
            $result[FieldHelper::FIELD_TS] = $this->ts;
        }

        return $result;
    }
}
