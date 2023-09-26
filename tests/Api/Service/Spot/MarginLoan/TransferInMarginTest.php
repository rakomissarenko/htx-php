<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferInMarginRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferInMarginResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class TransferInMarginTest extends AbstractTest
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

    private static function getRequest(string $symbol, string $currency, string $amount): TransferInMarginRequest
    {
        return new TransferInMarginRequest($symbol, $currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    private static function getResponse(string $response): TransferInMarginResponse
    {
        return new TransferInMarginResponse($response);
    }
}
