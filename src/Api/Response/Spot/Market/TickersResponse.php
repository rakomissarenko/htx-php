<?php

namespace Feralonso\Htx\Api\Response\Spot\Market;

use Feralonso\Htx\Api\Data\TickerData;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class TickersResponse extends AbstractResponse
{
    /**
     * @var TickerData[]
     */
    private array $tickers = [];

    /**
     * Time of Respond Generation, Unit: Millisecond
     */
    private ?string $ts;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        foreach ($data as $tickerData) {
            if (is_array($tickerData)) {
                $this->tickers[] = TickerData::initByArray($tickerData);
            }
        }
        $this->ts = FormatHelper::getNumericValueInArray($responseArray, FieldHelper::FIELD_TS);
    }

    /**
     * @return TickerData[]
     */
    public function getTickers(): array
    {
        return $this->tickers;
    }

    public function getTs(): ?string
    {
        return $this->ts;
    }
}
