<?php

namespace Feralonso\Htx\Api\Request\Spot\Common;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ChainsRequest extends AbstractRequest
{
    private const FIELD_SHOW_DESC = 'show-desc';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/settings/common/chains';

    private const SHOW_NO = 0;
    private const SHOW_ALL = 1;
    private const SHOW_SUSPEND = 2;
    private const SHOWS = [
        self::SHOW_NO,
        self::SHOW_ALL,
        self::SHOW_SUSPEND,
    ];

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
            $this->validateList($this->showDesc, self::FIELD_SHOW_DESC, self::SHOWS);
        }
        if ($this->ts) {
            $this->validateInteger($this->ts, self::FIELD_TS);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->showDesc !== null) {
            $result[self::FIELD_SHOW_DESC] = $this->showDesc;
        }
        if ($this->currency) {
            $result[self::FIELD_CURRENCY] = $this->currency;
        }
        if ($this->ts) {
            $result[self::FIELD_TS] = $this->ts;
        }

        return $result;
    }
}
