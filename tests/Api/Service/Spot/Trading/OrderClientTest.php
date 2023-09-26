<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\OrderClientRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\OrderClientResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class OrderClientTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $clientOrderId): void
    {
        $this->validateRequest(self::getRequest($clientOrderId));
    }

    public function validateProvider(): array
    {
        return [
            ['clientOrderId'],
        ];
    }

    private static function getRequest(string $clientOrderId): OrderClientRequest
    {
        return new OrderClientRequest($clientOrderId);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): OrderClientResponse
    {
        return new OrderClientResponse($response);
    }
}
