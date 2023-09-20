<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferInCrossMarginRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class TransferInCrossMarginTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency, string $amount): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TransferInCrossMarginRequest($currency, $amount);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY, '100'],
        ];
    }
}
