<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\ChainsRequest;
use Feralonso\Htx\Api\Response\Spot\Common\ChainsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class ChainsTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): ChainsRequest
    {
        return new ChainsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): ChainsResponse
    {
        return new ChainsResponse($response);
    }
}
