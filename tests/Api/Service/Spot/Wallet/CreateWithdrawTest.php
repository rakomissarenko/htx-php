<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\CreateWithdrawRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class CreateWithdrawTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $address, string $currency, string $amount): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($address, $currency, $amount)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['address', ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private function getRequest(string $address, string $currency, string $amount): CreateWithdrawRequest
    {
        return new CreateWithdrawRequest($address, $currency, $amount);
    }
}
