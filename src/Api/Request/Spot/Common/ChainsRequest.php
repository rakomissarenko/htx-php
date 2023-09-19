<?php

namespace Feralonso\Htx\Api\Request\Spot\Common;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ChainsRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/settings/common/chains';

    private ?int $showDesc = null;
    private ?string $currency = null;
    private ?string $ts = null;

    public function setShowDesc(int $showDesc): void
    {
        $this->showDesc = $showDesc;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
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
        if ($this->showDesc !== null) {
            ValidateHelper::validateList(
                (string) $this->showDesc,
                FieldHelper::FIELD_SHOW_DESC_HYPHEN,
                array_map(static fn (int $item) => (string) $item, EnumHelper::SHOWS),
            );
        }
        if ($this->ts) {
            ValidateHelper::validateInteger($this->ts, FieldHelper::FIELD_TS);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->showDesc !== null) {
            $result[FieldHelper::FIELD_SHOW_DESC_HYPHEN] = $this->showDesc;
        }
        if ($this->currency) {
            $result[FieldHelper::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->ts) {
            $result[FieldHelper::FIELD_TS] = $this->ts;
        }

        return $result;
    }
}
