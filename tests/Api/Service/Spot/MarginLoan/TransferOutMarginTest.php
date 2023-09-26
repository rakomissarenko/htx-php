<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferOutMarginRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferOutMarginResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;
use Feralonso\Tests\Helper\ValueHelper;

class TransferOutMarginTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol, string $currency, string $amount): void
    {
        $this->validateRequest(self::getRequest($symbol, $currency, $amount));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SYMBOL, ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private static function getRequest(string $symbol, string $currency, string $amount): TransferOutMarginRequest
    {
        return new TransferOutMarginRequest($symbol, $currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TransferOutMarginResponse
    {
        return new TransferOutMarginResponse($response);
    }
}
