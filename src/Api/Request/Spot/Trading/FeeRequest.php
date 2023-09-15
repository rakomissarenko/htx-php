<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class FeeRequest extends AbstractRequest
{
    private const FIELD_SYMBOLS = 'symbols';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/reference/transact-fee-rate';

    public function __construct(private array $symbols) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if (!$this->symbols) {
            $this->throwValidateException(self::FIELD_SYMBOLS);
        }
        foreach ($this->symbols as $symbol) {
            if (!is_scalar($symbol)) {
                $this->throwValidateException(self::FIELD_SYMBOLS);
            }
        }
    }

    public function toArray(): array
    {
        return [
            self::FIELD_SYMBOLS => implode(',', $this->symbols),
        ];
    }
}
