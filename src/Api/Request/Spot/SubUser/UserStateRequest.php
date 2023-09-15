<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class UserStateRequest extends AbstractRequest
{
    private const FIELD_SUB_UID = 'subUid';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/sub-user/user-state';

    public function __construct(private string $subUid) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateInteger($this->subUid, self::FIELD_SUB_UID);
    }

    public function toArray(): array
    {
        return [
            self::FIELD_SUB_UID => $this->subUid,
        ];
    }
}
