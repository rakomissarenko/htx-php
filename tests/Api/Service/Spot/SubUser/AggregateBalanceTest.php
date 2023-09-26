<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\AggregateBalanceRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\AggregateBalanceResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;

class AggregateBalanceTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): AggregateBalanceRequest
    {
        return new AggregateBalanceRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): AggregateBalanceResponse
    {
        return new AggregateBalanceResponse($response);
    }
}
