<?php

namespace Feralonso\Htx\Api\Request\Spot\Market;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class CandlesRequest extends AbstractRequest
{
    private const FIELD_PERIOD = 'period';

    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/market/history/kline';

    private const PERIOD_1MIN = '1min';
    private const PERIOD_5MIN = '5min';
    private const PERIOD_15MIN = '15min';
    private const PERIOD_30MIN = '30min';
    private const PERIOD_60MIN = '60min';
    private const PERIOD_4HOUR = '4hour';
    private const PERIOD_1DAY = '1day';
    private const PERIOD_1MON = '1mon';
    private const PERIOD_1WEEK = '1week';
    private const PERIOD_1YEAR = '1year';
    private const PERIODS = [
        self::PERIOD_1MIN,
        self::PERIOD_5MIN,
        self::PERIOD_15MIN,
        self::PERIOD_30MIN,
        self::PERIOD_60MIN,
        self::PERIOD_4HOUR,
        self::PERIOD_1DAY,
        self::PERIOD_1MON,
        self::PERIOD_1WEEK,
        self::PERIOD_1YEAR,
    ];

    private const SIZE_MIN = 1;
    private const SIZE_MAX = 2000;

    private ?int $size = null;

    public function __construct(
        private string $symbol,
        private string $period,
    ) {}

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateList($this->period, self::FIELD_PERIOD, self::PERIODS);
        if ($this->size) {
            $this->validateRange(
                (string) $this->size,
                FieldHelper::FIELD_SIZE,
                (string) self::SIZE_MIN,
                (string) self::SIZE_MAX,
            );
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_SYMBOL => $this->symbol,
            self::FIELD_PERIOD        => $this->period,
        ];
        if ($this->size) {
            $result[FieldHelper::FIELD_SIZE] = $this->size;
        }

        return $result;
    }
}
