<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;

class TickerData
{
    /**
     * The aggregated trading volume in last 24 hours (rotating 24h)
     */
    private ?string $amount = null;

    /**
     * Best ask price
     */
    private ?string $ask = null;

    /**
     * Best ask size
     */
    private ?string $askSize = null;

    /**
     * Best bid price
     */
    private ?string $bid = null;

    /**
     * Best bid size
     */
    private ?string $bidSize = null;

    /**
     * The closing price of a nature day (Singapore time)
     */
    private ?string $close = null;

    /**
     * The number of completed trades of last 24 hours (rotating 24h)
     */
    private ?int $count = null;

    /**
     * The highest price of a nature day (Singapore time)
     */
    private ?string $high = null;

    /**
     * The lowest price of a nature day (Singapore time)
     */
    private ?string $low = null;

    /**
     * The opening price of a nature day (Singapore time)
     */
    private ?string $open = null;

    /**
     * The trading symbol of this object, e.g. btcusdt, bccbtc
     */
    private ?string $symbol = null;

    /**
     * The aggregated trading value in last 24 hours (rotating 24h)
     */
    private ?string $vol = null;

    public static function initByArray(array $data): self
    {
        $result = new self();

        $amount = FormatHelper::getNumericValueInArray($data, FieldHelper::FIELD_AMOUNT);
        if ($amount !== null) {
            $result->setAmount($amount);
        }
        $ask = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_ASK);
        if ($ask !== null) {
            $result->setAsk($ask);
        }
        $askSize = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_ASK_SIZE);
        if ($askSize !== null) {
            $result->setAskSize($askSize);
        }
        $bid = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_BID);
        if ($bid !== null) {
            $result->setBid($bid);
        }
        $bidSize = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_BID_SIZE);
        if ($bidSize !== null) {
            $result->setBidSize($bidSize);
        }
        $close = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_CLOSE);
        if ($close !== null) {
            $result->setClose($close);
        }
        $count = FormatHelper::getIntValueInArray($data, FieldResponseHelper::FIELD_COUNT);
        if ($count !== null) {
            $result->setCount($count);
        }
        $high = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_HIGH);
        if ($high !== null) {
            $result->setHigh($high);
        }
        $low = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_LOW);
        if ($low !== null) {
            $result->setLow($low);
        }
        $open = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_OPEN);
        if ($open !== null) {
            $result->setOpen($open);
        }
        $symbol = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_SYMBOL);
        if ($symbol !== null) {
            $result->setSymbol($symbol);
        }
        $vol = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_VOL);
        if ($vol !== null) {
            $result->setVol($vol);
        }

        return $result;
    }

    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    public function setAsk(string $ask): void
    {
        $this->ask = $ask;
    }

    public function setAskSize(string $askSize): void
    {
        $this->askSize = $askSize;
    }

    public function setBid(string $bid): void
    {
        $this->bid = $bid;
    }

    public function setBidSize(string $bidSize): void
    {
        $this->bidSize = $bidSize;
    }

    public function setClose(string $close): void
    {
        $this->close = $close;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function setHigh(string $high): void
    {
        $this->high = $high;
    }

    public function setLow(string $low): void
    {
        $this->low = $low;
    }

    public function setOpen(string $open): void
    {
        $this->open = $open;
    }

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    public function setVol(string $vol): void
    {
        $this->vol = $vol;
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_AMOUNT           => $this->amount,
            FieldResponseHelper::FIELD_ASK      => $this->ask,
            FieldResponseHelper::FIELD_ASK_SIZE => $this->askSize,
            FieldResponseHelper::FIELD_BID      => $this->bid,
            FieldResponseHelper::FIELD_BID_SIZE => $this->bidSize,
            FieldResponseHelper::FIELD_CLOSE    => $this->close,
            FieldResponseHelper::FIELD_COUNT    => $this->count,
            FieldResponseHelper::FIELD_HIGH     => $this->high,
            FieldResponseHelper::FIELD_LOW      => $this->low,
            FieldResponseHelper::FIELD_OPEN     => $this->open,
            FieldHelper::FIELD_SYMBOL           => $this->symbol,
            FieldResponseHelper::FIELD_VOL      => $this->vol,
        ];
    }
}
