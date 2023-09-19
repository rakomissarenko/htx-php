<?php

namespace Feralonso\Htx\Api\Request\Spot\Market;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TradeHistoryRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/market/history/trade';

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 2000;

    private ?int $size = null;

    public function __construct(private string $symbol) {}

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->size) {
            ValidateHelper::validateRange(
                (string) $this->size,
                FieldHelper::FIELD_SIZE,
                (string) self::SIZE_MIN,
                (string) self::SIZE_MAX,
            );
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_SYMBOL => $this->symbol,
        ];
        if ($this->size) {
            $result[FieldHelper::FIELD_SIZE] = $this->size;
        }

        return $result;
    }
}
