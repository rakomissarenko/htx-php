<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayOrderRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class RepayOrderTest extends TestCase
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
}
