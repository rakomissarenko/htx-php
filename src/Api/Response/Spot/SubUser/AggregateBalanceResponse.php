<?php

namespace Feralonso\Htx\Api\Response\Spot\SubUser;

use Feralonso\Htx\Api\Data\BalanceData;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class AggregateBalanceResponse extends AbstractResponse
{
    /**
     * @var BalanceData[]
     */
    private array $balances = [];

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        if ($data) {
            foreach ($data as $balance) {
                if (is_array($balance)) {
                    $this->balances[] = BalanceData::initByArray($balance);
                }
            }
        }
    }

    /**
     * @return BalanceData[]
     */
    public function getBalances(): array
    {
        return $this->balances;
    }

    /**
     * @return BalanceData[]
     */
    public function getNotZeroBalances(): array
    {
        $result = [];

        foreach ($this->balances as $balanceData) {
            if ($balanceData->isNotZero()) {
                $result[] = $balanceData;
            }
        }

        return $result;
    }
}
