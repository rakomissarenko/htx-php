<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\OrderRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\OrderResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class OrderTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId): void
    {
        $this->validateRequest(self::getRequest($orderId));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID],
        ];
    }

    private static function getRequest(string $orderId): OrderRequest
    {
        return new OrderRequest($orderId);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): OrderResponse
    {
        return new OrderResponse($response);
    }
}
