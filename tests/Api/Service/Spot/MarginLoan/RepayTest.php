<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayResponse;
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

        $this->getRequest($accountId, $currency, $amount, $transactId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID, ValueHelper::CURRENCY, ValueHelper::AMOUNT, '12345'],
        ];
    }

    private function getRequest(string $accountId, string $currency, string $amount, string $transactId): RepayRequest
    {
        return new RepayRequest($accountId, $currency, $amount, $transactId);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): RepayResponse
    {
        return new RepayResponse($response);
    }
}
