<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayOrderRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayOrderResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class RepayOrderTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId, string $amount): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($orderId, $amount)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID, ValueHelper::AMOUNT],
        ];
    }

    private function getRequest(string $orderId, string $amount): RepayOrderRequest
    {
        return new RepayOrderRequest($orderId, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): RepayOrderResponse
    {
        return new RepayOrderResponse($response);
    }
}
