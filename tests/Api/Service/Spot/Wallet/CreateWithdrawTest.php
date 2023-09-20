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

        $request = new CreateWithdrawRequest($address, $currency, $amount);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['address', ValueHelper::CURRENCY, '100'],
        ];
    }
}
