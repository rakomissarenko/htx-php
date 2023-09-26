<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\OrdersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class OrdersTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol, string $currency, string $amount): void
    {
        $this->validateRequest(self::getRequest($symbol, $currency, $amount));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SYMBOL, ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private static function getRequest(string $symbol, string $currency, string $amount): OrdersRequest
    {
        return new OrdersRequest($symbol, $currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): OrdersResponse
    {
        return new OrdersResponse($response);
    }
}
