<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class RepayTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId, string $currency, string $amount, string $transactId): void
    {
        $this->expectNotToPerformAssertions();

        $request = new RepayRequest($accountId, $currency, $amount, $transactId);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111', ValueHelper::CURRENCY, '100', '12345'],
        ];
    }
}
