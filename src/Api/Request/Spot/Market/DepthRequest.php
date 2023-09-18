<?php

namespace Feralonso\Htx\Api\Request\Spot\Market;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class DepthRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/market/depth';

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
            $this->validateList($this->depth, FieldHelper::FIELD_DEPTH, EnumHelper::DEPTHS);
        }
        if ($this->type) {
            ValidateHelper::validateList($this->type, FieldHelper::FIELD_TYPE, EnumHelper::STEPS);
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
