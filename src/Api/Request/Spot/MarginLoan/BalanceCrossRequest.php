<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class BalanceCrossRequest extends AbstractRequest
{
    private const FIELD_SUB_UID = 'sub-uid';

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
            $this->validateInteger($this->subUid, self::FIELD_SUB_UID);
        }
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->subUid) {
            $result[self::FIELD_SUB_UID] = $this->subUid;
        }

        return $result;
    }
}
