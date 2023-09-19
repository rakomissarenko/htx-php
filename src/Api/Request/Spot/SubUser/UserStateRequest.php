<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class UserStateRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/sub-user/user-state';

    public function __construct(private string $subUid) {}

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
            FieldHelper::FIELD_SUB_UID => $this->subUid,
        ];
    }
}
