<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\LoanInfoRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class LoanInfoTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $symbols): void
    {
        $this->expectNotToPerformAssertions();

        $request = new LoanInfoRequest($symbols);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            [['symbol1', 'symbol2']],
        ];
    }
}
