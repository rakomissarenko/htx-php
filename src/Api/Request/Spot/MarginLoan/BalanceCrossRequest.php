<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class BalanceCrossRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/cross-margin/accounts/balance';

    private ?string $subUid = null;

    public function setSubUid(string $subUid): void
    {
        $this->subUid = $subUid;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->subUid) {
            ValidateHelper::validateInteger($this->subUid, FieldHelper::FIELD_SUB_UID_HYPHEN);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->subUid) {
            $result[FieldHelper::FIELD_SUB_UID_HYPHEN] = $this->subUid;
        }

        return $result;
    }
}
