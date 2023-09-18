<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;

class BalanceRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/margin/accounts/balance';

    private ?string $symbol = null;
    private ?int $subUid = null;

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    public function setSubUid(int $subUid): void
    {
        $this->subUid = $subUid;
    }

    public function toArray(): array
    {
        $result = [];
        if ($this->symbol) {
            $result[FieldHelper::FIELD_SYMBOL] = $this->symbol;
        }
        if ($this->subUid) {
            $result[FieldHelper::FIELD_SUB_UID_HYPHEN] = $this->subUid;
        }

        return $result;
    }
}
