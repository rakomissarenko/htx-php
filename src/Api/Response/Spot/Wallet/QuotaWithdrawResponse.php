<?php

namespace Feralonso\Htx\Api\Response\Spot\Wallet;

use Feralonso\Htx\Api\Data\ChainQuotaData;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class QuotaWithdrawResponse extends AbstractResponse
{
    /**
     * @var ChainQuotaData[]
     */
    private array $chainsQuotaData = [];
    private ?string $currency;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        foreach ($data as $chainQuotaData) {
            if (is_array($chainQuotaData)) {
                $this->chainsQuotaData[] = ChainQuotaData::initByArray($chainQuotaData);
            }
        }
        $this->currency = FormatHelper::getStringValueInArray($responseArray, FieldHelper::FIELD_CURRENCY);
    }

    public function getChainsQuotaData(): array
    {
        return $this->chainsQuotaData;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }
}
