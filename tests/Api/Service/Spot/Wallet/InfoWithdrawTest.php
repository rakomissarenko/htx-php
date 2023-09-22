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

        $this->getRequest($clientOrderId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['clientOrderId'],
        ];
    }

    private function getRequest(string $clientOrderId): InfoWithdrawRequest
    {
        return new InfoWithdrawRequest($clientOrderId);
    }
}
