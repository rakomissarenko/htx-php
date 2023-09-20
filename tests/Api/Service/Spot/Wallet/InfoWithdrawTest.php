<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\InfoWithdrawRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class InfoWithdrawTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $clientOrderId): void
    {
        $this->expectNotToPerformAssertions();

        $request = new InfoWithdrawRequest($clientOrderId);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['clientOrderId'],
        ];
    }
}
