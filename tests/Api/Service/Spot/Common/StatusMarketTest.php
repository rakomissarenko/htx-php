<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\StatusMarketRequest;
use Feralonso\Htx\Api\Response\Spot\Common\StatusMarketResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;

class StatusMarketTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): StatusMarketRequest
    {
        return new StatusMarketRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): StatusMarketResponse
    {
        return new StatusMarketResponse($response);
    }
}
