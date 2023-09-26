<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferOutCrossMarginRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferOutCrossMarginResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class TransferOutCrossMarginTest extends AbstractTest
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

    private static function getRequest(string $currency, string $amount): TransferOutCrossMarginRequest
    {
        return new TransferOutCrossMarginRequest($currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): TransferOutCrossMarginResponse
    {
        return new TransferOutCrossMarginResponse($response);
    }
}
