<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\BalanceRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class BalanceTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($accountId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['12345'],
        ];
    }

    private function getRequest(string $accountId): BalanceRequest
    {
        return new BalanceRequest($accountId);
    }
}
