<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\LimitRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LimitResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;

class LimitTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): LimitRequest
    {
        return new LimitRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): LimitResponse
    {
        return new LimitResponse($response);
    }
}
