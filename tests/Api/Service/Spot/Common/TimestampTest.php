<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\TimestampRequest;
use Feralonso\Htx\Api\Response\Spot\Common\TimestampResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class TimestampTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest($this->getRequest());
    }

    private function getRequest(): TimestampRequest
    {
        return new TimestampRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): TimestampResponse
    {
        return new TimestampResponse($response);
    }
}
