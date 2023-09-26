<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\StatusMarketRequest;
use Feralonso\Htx\Api\Response\Spot\Common\StatusMarketResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class StatusMarketTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest($this->getRequest());
    }

    private function getRequest(): StatusMarketRequest
    {
        return new StatusMarketRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): StatusMarketResponse
    {
        return new StatusMarketResponse($response);
    }
}
