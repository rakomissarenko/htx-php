<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CancelAllAfterRequest extends AbstractRequest
{
    protected const PATH = '/v2/algo-orders/cancel-all-after';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const TIMEOUT_0 = 0;
    private const TIMEOUT_MIN = 5;

    public function __construct(private int $timeout) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->timeout < self::TIMEOUT_MIN && $this->timeout !== self::TIMEOUT_0) {
            ValidateHelper::throwValidateException(FieldHelper::FIELD_TIMEOUT);
        }
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_TIMEOUT => $this->timeout,
        ];
    }
}
