<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class RepayTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId, string $currency, string $amount, string $transactId): void
    {
        $this->validateRequest(self::getRequest($accountId, $currency, $amount, $transactId));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID, ValueHelper::CURRENCY, ValueHelper::AMOUNT, '12345'],
        ];
    }

    private static function getRequest(string $accountId, string $currency, string $amount, string $transactId): RepayRequest
    {
        return new RepayRequest($accountId, $currency, $amount, $transactId);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): RepayResponse
    {
        return new RepayResponse($response);
    }
}
