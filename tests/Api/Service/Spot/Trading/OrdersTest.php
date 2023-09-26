<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\OrdersRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\OrdersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class OrdersTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): OrdersRequest
    {
        return new OrdersRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): OrdersResponse
    {
        return new OrdersResponse($response);
    }
}
