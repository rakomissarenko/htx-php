<?php

namespace Feralonso\Htx\Api\Request\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\AbstractRequest;

class RepayOrderCrossRequest extends RepayOrderRequest
{
    protected const PATH = '/v1/cross-margin/orders/';
    private const PATH_AFTER = '/repay';
    protected const PERMISSION = self::PERMISSION_TRADE;

    public function getPath(): string
    {
        return self::PATH . $this->getOrderId() . self::PATH_AFTER;
    }
}
