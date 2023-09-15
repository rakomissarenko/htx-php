<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ApiKeyRequest extends AbstractRequest
{
    private const FIELD_ACCESS_KEY = 'accessKey';
    private const FIELD_UID = 'uid';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/user/api-key';

    private ?string $accessKey = null;

    public function __construct(private string $uid) {}

    public function setAccessKey(string $accessKey): void
    {
        $this->accessKey = $accessKey;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateInteger($this->uid, self::FIELD_UID);
    }

    public function toArray(): array
    {
        $result = [
            self::FIELD_UID => $this->uid,
        ];
        if ($this->accessKey) {
            $result[self::FIELD_ACCESS_KEY] = $this->accessKey;
        }

        return $result;
    }
}
