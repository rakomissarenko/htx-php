<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CancelWithdrawRequest extends AbstractRequest
{
    private const FIELD_WITHDRAW_ID = 'withdraw-id';

    protected const PATH = '/v1/dw/withdraw-virtual/';
    private const PATH_AFTER = '/cancel';
    protected const PERMISSION = self::PERMISSION_WITHDRAW;

    public function __construct(private string $withdrawId)
    {}

    public function getPath(): string
    {
        return self::PATH . $this->withdrawId . self::PATH_AFTER;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if (!is_numeric($this->withdrawId)) {
            throw new HtxValidateException(
                HtxValidateException::getErrorMessage(self::FIELD_WITHDRAW_ID),
                HtxValidateException::ERROR_INPUT_VALUE_INVALID
            );
        }
    }

    public function toArray(): array
    {
        return [
            self::FIELD_WITHDRAW_ID => $this->withdrawId,
        ];
    }
}
