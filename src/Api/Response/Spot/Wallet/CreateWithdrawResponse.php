<?php

namespace Feralonso\Htx\Api\Response\Spot\Wallet;

use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class CreateWithdrawResponse extends AbstractResponse
{
    private ?string $transferId;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $this->transferId = FormatHelper::getNumericValueInArray($responseArray, self::FIELD_DATA);
    }

    public function getTransferId(): ?string
    {
        return $this->transferId;
    }
}
