<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\AbstractRequest;

class BalanceRequest extends AbstractRequest
{
    private const FIELD_SUB_UID = 'sub-uid';
    private const FIELD_SYMBOL = 'symbol';

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
            $result[self::FIELD_SYMBOL] = $this->symbol;
        }
        if ($this->subUid) {
            $result[self::FIELD_SUB_UID] = $this->subUid;
        }

        return $result;
    }
}
