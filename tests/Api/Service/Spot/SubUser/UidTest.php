<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\UidRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\UidResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class UidTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): UidRequest
    {
        return new UidRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): UidResponse
    {
        return new UidResponse($response);
    }
}
