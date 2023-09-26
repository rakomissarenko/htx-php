<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\LoanInfoRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LoanInfoResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class LoanInfoTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $symbols): void
    {
        $this->validateRequest(self::getRequest($symbols));
    }

    public function validateProvider(): array
    {
        return [
            [['symbol1', 'symbol2']],
        ];
    }

    private static function getRequest(array $symbols): LoanInfoRequest
    {
        return new LoanInfoRequest($symbols);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): LoanInfoResponse
    {
        return new LoanInfoResponse($response);
    }
}
