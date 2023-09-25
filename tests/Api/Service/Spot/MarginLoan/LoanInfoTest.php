<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\LoanInfoRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LoanInfoResponse;
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

        $this->getRequest($symbols)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [['symbol1', 'symbol2']],
        ];
    }

    private function getRequest(array $symbols): LoanInfoRequest
    {
        return new LoanInfoRequest($symbols);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): LoanInfoResponse
    {
        return new LoanInfoResponse($response);
    }
}
