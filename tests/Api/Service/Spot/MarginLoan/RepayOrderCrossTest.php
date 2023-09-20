<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayOrderCrossRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class RepayOrderCrossTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId, string $amount): void
    {
        $this->expectNotToPerformAssertions();

        $request = new RepayOrderCrossRequest($orderId, $amount);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111', '100'],
        ];
    }
}
