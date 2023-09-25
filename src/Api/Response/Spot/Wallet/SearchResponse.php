<?php

namespace Feralonso\Htx\Api\Response\Spot\Wallet;

use Feralonso\Htx\Api\Data\TransactionData;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class SearchResponse extends AbstractResponse
{
    /**
     * @var TransactionData[]
     */
    private array $transactions = [];

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        foreach ($data as $transactionData) {
            if (is_array($transactionData)) {
                $this->transactions[] = TransactionData::initByArray($transactionData);
            }
        }
    }

    /**
     * @return TransactionData[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }
}
