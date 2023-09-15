<?php

namespace Feralonso\Htx\Api\Request\Spot\Common;

use Feralonso\Htx\Api\Request\AbstractRequest;

class StatusMarketRequest extends AbstractRequest
{
    protected const METHOD = self::METHOD_GET;
    protected const PATH = '/v2/market-status';
}
