<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferRequest extends AbstractRequest
{
    protected const PATH = '/v1/subuser/transfer';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $subUid,
        private string $currency,
        private string $amount,
        private string $type,
        private string $clientOrderId,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateInteger($this->subUid, FieldHelper::FIELD_SUB_UID_HYPHEN);
        $this->validateNumeric($this->amount, FieldHelper::FIELD_AMOUNT);
        ValidateHelper::validateList($this->type, FieldHelper::FIELD_TYPE, EnumHelper::TRANSFER_TYPES);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SUB_UID_HYPHEN  => $this->subUid,
            FieldHelper::FIELD_CURRENCY        => $this->currency,
            FieldHelper::FIELD_AMOUNT          => $this->amount,
            FieldHelper::FIELD_TYPE            => $this->type,
            FieldHelper::FIELD_CLIENT_ORDER_ID => $this->clientOrderId,
        ];
    }
}
