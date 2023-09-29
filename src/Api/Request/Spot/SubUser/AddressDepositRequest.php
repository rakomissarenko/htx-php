<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class AddressDepositRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/sub-user/deposit-address';

    public function __construct(
        private string $subUid,
        private string $currency,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateNotEmptyString($this->subUid, FieldHelper::FIELD_SUB_UID);
        ValidateHelper::validateInteger($this->subUid, FieldHelper::FIELD_SUB_UID);
        ValidateHelper::validateNotEmptyString($this->currency, FieldHelper::FIELD_CURRENCY);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SUB_UID  => $this->subUid,
            FieldHelper::FIELD_CURRENCY => $this->currency,
        ];
    }
}
