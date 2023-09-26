<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\OrderRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\OrderResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class OrderTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($orderId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID],
        ];
    }

    private function getRequest(string $orderId): OrderRequest
    {
        return new OrderRequest($orderId);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): OrderResponse
    {
        return new OrderResponse($response);
    }
}
