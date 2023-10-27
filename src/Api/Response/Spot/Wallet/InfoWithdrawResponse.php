<?php

namespace Feralonso\Htx\Api\Response\Spot\Wallet;

use Feralonso\Htx\Api\Data\TransactionData;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class InfoWithdrawResponse extends AbstractResponse
{
    private ?TransactionData $transactionData = null;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        if ($data) {
            $this->transactionData = TransactionData::initByArray($data);
        }
    }

    public function getTransactionData(): ?TransactionData
    {
        return $this->transactionData;
    }
}
