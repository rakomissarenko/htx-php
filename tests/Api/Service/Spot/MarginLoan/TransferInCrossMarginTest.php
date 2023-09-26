<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferInCrossMarginRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferInCrossMarginResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;
use Feralonso\Tests\Helper\ValueHelper;

class TransferInCrossMarginTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency, string $amount): void
    {
        $this->validateRequest(self::getRequest($currency, $amount));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private static function getRequest(string $currency, string $amount): TransferInCrossMarginRequest
    {
        return new TransferInCrossMarginRequest($currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TransferInCrossMarginResponse
    {
        return new TransferInCrossMarginResponse($response);
    }
}
