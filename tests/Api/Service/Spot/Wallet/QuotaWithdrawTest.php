<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\QuotaWithdrawRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\QuotaWithdrawResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class QuotaWithdrawTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency): void
    {
        $this->validateRequest(self::getRequest($currency));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY],
        ];
    }

    private static function getRequest(string $currency): QuotaWithdrawRequest
    {
        return new QuotaWithdrawRequest($currency);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): QuotaWithdrawResponse
    {
        return new QuotaWithdrawResponse($response);
    }
}
