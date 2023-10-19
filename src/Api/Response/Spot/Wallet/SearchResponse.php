<?php

namespace Feralonso\Htx\Api\Response\Spot\Wallet;

use Feralonso\Htx\Api\Data\TransactionData;
use Feralonso\Htx\Api\Helper\EnumHelper;
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
    private ?int $status;
    private ?string $message;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        if ($data) {
            foreach ($data as $transactionData) {
                if (is_array($transactionData)) {
                    $this->transactions[] = TransactionData::initByArray($transactionData);
                }
            }
        }
        $this->nextId = FormatHelper::getNumericValueInArray($responseArray, FieldResponseHelper::FIELD_NEXT_ID);
        $this->status = FormatHelper::getIntValueInArray($responseArray, FieldResponseHelper::FIELD_STATUS);
        $this->message = FormatHelper::getStringValueInArray($responseArray, FieldResponseHelper::FIELD_MESSAGE);
    }

    /**
     * @return TransactionData[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function getTransactionByAmount(string $amount): ?TransactionData
    {
        $result = null;

        foreach ($this->transactions as $transactionData) {
            if (
                bccomp($transactionData->getAmount(), $amount, FormatHelper::SCALE_SIZE) === 0 &&
                ($result === null || $result->getCreatedAt() < $transactionData->getCreatedAt())
            ) {
                $result = $transactionData;
            }
        }

        return $result;
    }

    public function getNextId(): ?string
    {
        return $this->nextId;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function isSuccessResponse(): bool
    {
        return $this->status === EnumHelper::RESPONSE_STATUS_SUCCESS && $this->message === null;
    }
}
