<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\TimestampRequest;
use Feralonso\Htx\Api\Response\Spot\Common\TimestampResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class TimestampTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): TimestampRequest
    {
        return new TimestampRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TimestampResponse
    {
        return new TimestampResponse($response);
    }
}
