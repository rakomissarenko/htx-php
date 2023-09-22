<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\QuotaWithdrawRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class QuotaWithdrawTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($currency)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY],
        ];
    }

    private function getRequest(string $currency): QuotaWithdrawRequest
    {
        return new QuotaWithdrawRequest($currency);
    }
}
