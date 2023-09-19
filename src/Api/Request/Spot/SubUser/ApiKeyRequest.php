<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ApiKeyRequest extends AbstractRequest
{
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
        ValidateHelper::validateNotEmptyString($this->uid, FieldHelper::FIELD_UID);
        ValidateHelper::validateInteger($this->uid, FieldHelper::FIELD_UID);
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_UID => $this->uid,
        ];
        if ($this->accessKey) {
            $result[FieldHelper::FIELD_ACCESS_KEY] = $this->accessKey;
        }

        return $result;
    }
}
