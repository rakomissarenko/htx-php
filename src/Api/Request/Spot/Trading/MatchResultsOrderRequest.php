<?php

namespace Feralonso\Htx\Api\Request\Spot\Trading;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;

class MatchResultsOrderRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v1/order/orders/';
    private const PATH_AFTER = '/matchresults';

    public function __construct(private string $orderId) {}

    public function getPath(): string
    {
        return self::PATH . $this->orderId . self::PATH_AFTER;
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_ORDER_ID => $this->orderId,
        ];
    }
}
