<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ApiKeyDeleteRequest extends AbstractRequest
{
    protected const PATH = '/v2/sub-user/api-key-deletion';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function __construct(
        private string $subUid,
        private string $accessKey,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateInteger($this->subUid, FieldHelper::FIELD_SUB_UID);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SUB_UID    => $this->subUid,
            FieldHelper::FIELD_ACCESS_KEY => $this->accessKey,
        ];
    }
}
