<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\LoanInfoRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LoanInfoResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class LoanInfoTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $symbols): void
    {
        $this->validateRequest($this->getRequest($symbols));
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
