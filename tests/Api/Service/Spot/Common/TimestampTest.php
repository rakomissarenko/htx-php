<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\TimestampRequest;
use Feralonso\Htx\Api\Response\Spot\Common\TimestampResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class TimestampTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
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
