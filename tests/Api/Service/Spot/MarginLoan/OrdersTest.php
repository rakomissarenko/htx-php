<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersRequest;
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

        $request = new OrdersRequest($symbol, $currency, $amount);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['symbol', ValueHelper::CURRENCY, '100'],
        ];
    }
}
