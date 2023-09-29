<?php

namespace Feralonso\Htx\Api\Response\Spot\Account;

use Feralonso\Htx\Api\Data\BalanceAccountData;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class BalanceResponse extends AbstractResponse
{
    private ?BalanceAccountData $balanceAccountData;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        if ($data) {
            $this->balanceAccountData = BalanceAccountData::initByArray($data);
        }
    }

    public function getBalanceAccountData(): ?BalanceAccountData
    {
        return $this->balanceAccountData;
    }
}
