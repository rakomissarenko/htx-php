<?php

namespace Feralonso\Htx\Api\Response\Spot\SubUser;

use Feralonso\Htx\Api\Data\BalanceAccountData;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class BalanceResponse extends AbstractResponse
{
    /**
     * @var BalanceAccountData[]
     */
    private array $balanceAccountsData = [];

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        if ($data) {
            foreach ($data as $balanceAccountData) {
                $this->balanceAccountsData[] = BalanceAccountData::initByArray($balanceAccountData);
            }
        }
    }

    /**
     * @return BalanceAccountData[]
     */
    public function getBalanceAccountsData(): array
    {
        return $this->balanceAccountsData;
    }
}
