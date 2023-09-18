<?php

namespace Feralonso\Htx\Api\Request\Spot\Market;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class DepthRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/market/depth';

    private const DEPTH_5 = 5;
    private const DEPTH_10 = 10;
    private const DEPTH_20 = 20;
    private const DEPTHS = [
        self::DEPTH_5,
        self::DEPTH_10,
        self::DEPTH_20,
    ];

    private const STEP_0 = 'step0';
    private const STEP_1 = 'step1';
    private const STEP_2 = 'step2';
    private const STEP_3 = 'step3';
    private const STEP_4 = 'step4';
    private const STEP_5 = 'step5';
    private const STEPS = [
        self::STEP_0,
        self::STEP_1,
        self::STEP_2,
        self::STEP_3,
        self::STEP_4,
        self::STEP_5,
    ];

    private ?int $depth = null;
    private ?string $type = null;

    public function __construct(private string $symbol) {}

    public function setDepth(int $depth): void
    {
        $this->depth = $depth;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        if ($this->depth) {
            $this->validateList($this->depth, FieldHelper::FIELD_DEPTH, self::DEPTHS);
        }
        if ($this->type) {
            $this->validateList($this->type, FieldHelper::FIELD_TYPE, self::STEPS);
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_SYMBOL => $this->symbol,
        ];
        if ($this->depth) {
            $result[FieldHelper::FIELD_DEPTH] = $this->depth;
        }
        if ($this->type) {
            $result[FieldHelper::FIELD_TYPE] = $this->type;
        }

        return $result;
    }
}
