<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\OrdersRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\OrdersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class OrdersTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): OrdersRequest
    {
        return new OrdersRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): OrdersResponse
    {
        return new OrdersResponse($response);
    }
}
