<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferOutMarginRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class TransferOutMarginTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol, string $currency, string $amount): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($symbol, $currency, $amount)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['symbol', ValueHelper::CURRENCY, '100'],
        ];
    }

    private function getRequest(string $symbol, string $currency, string $amount): TransferOutMarginRequest
    {
        return new TransferOutMarginRequest($symbol, $currency, $amount);
    }
}
