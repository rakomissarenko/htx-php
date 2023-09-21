<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Account\TransferFuturesRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class TransferFuturesTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency, string $amount, string $type): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TransferFuturesRequest($currency, $amount, $type);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY, '100', EnumHelper::TRANSFER_FUTURES_TYPE_FUTURES_TO_PRO],
        ];
    }
}
