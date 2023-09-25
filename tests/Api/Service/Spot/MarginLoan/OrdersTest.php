<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\OrdersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class OrdersTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol, string $currency, string $amount): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($symbol, $currency, $amount)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SYMBOL, ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private function getRequest(string $symbol, string $currency, string $amount): OrdersRequest
    {
        return new OrdersRequest($symbol, $currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): OrdersResponse
    {
        return new OrdersResponse($response);
    }
}
