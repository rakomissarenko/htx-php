<?php

namespace Feralonso\Htx\Api\Response\Spot\Wallet;

use Feralonso\Htx\Api\Data\TransactionData;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class SearchResponse extends AbstractResponse
{
    /**
     * @var TransactionData[]
     */
    private array $transactions = [];
    private ?string $nextId;

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
        $this->nextId = FormatHelper::getNumericValueInArray($responseArray, FieldResponseHelper::FIELD_NEXT_ID);
    }

    /**
     * @return TransactionData[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function getNextId(): ?string
    {
        return $this->nextId;
    }
}
