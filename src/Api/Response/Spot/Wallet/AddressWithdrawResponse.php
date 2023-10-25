<?php

namespace Feralonso\Htx\Api\Response\Spot\Wallet;

use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;

class AddressWithdrawResponse extends AddressDepositResponse
{
    private ?string $nextId;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $this->nextId = FormatHelper::getNumericValueInArray($responseArray, FieldResponseHelper::FIELD_NEXT_ID);
    }

    public function getNextId(): ?string
    {
        return $this->nextId;
    }
}
