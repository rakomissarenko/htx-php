<?php

namespace Feralonso\Htx\Api\Request\Spot\Wallet;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class InfoWithdrawRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/query/withdraw/client-order-id';

    private const CLIENT_ORDER_ID_MAX_SIZE = 32;

    public function __construct(private string $clientOrderId)
    {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateMaxLength($this->clientOrderId, FieldHelper::FIELD_CLIENT_ORDER_ID, self::CLIENT_ORDER_ID_MAX_SIZE);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_CLIENT_ORDER_ID => $this->clientOrderId,
        ];
    }
}
