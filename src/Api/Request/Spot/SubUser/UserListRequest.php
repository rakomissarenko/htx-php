<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class UserListRequest extends AbstractRequest
{
    private const FIELD_FROM_ID = 'fromId';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/sub-user/user-list';

    private ?string $fromId = null;

    public function setFromId(string $fromId): void
    {
        $this->fromId = $fromId;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->fromId) {
            $this->validateInteger($this->fromId, self::FIELD_FROM_ID);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->fromId) {
            $result[self::FIELD_FROM_ID] = $this->fromId;
        }

        return $result;
    }
}
