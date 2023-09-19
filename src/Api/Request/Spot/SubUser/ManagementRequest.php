<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ManagementRequest extends AbstractRequest
{
    protected const PATH = '/v2/sub-user/management';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $subUid,
        private string $action,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateNotEmptyString($this->subUid, FieldHelper::FIELD_SUB_UID);
        ValidateHelper::validateInteger($this->subUid, FieldHelper::FIELD_SUB_UID);
        ValidateHelper::validateList($this->action, FieldHelper::FIELD_ACTION, EnumHelper::ACTIONS);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SUB_UID => $this->subUid,
            FieldHelper::FIELD_ACTION  => $this->action,
        ];
    }
}
