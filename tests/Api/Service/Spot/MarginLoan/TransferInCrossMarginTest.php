<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferInCrossMarginRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferInCrossMarginResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class TransferInCrossMarginTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency, string $amount): void
    {
        $this->validateRequest($this->getRequest($currency, $amount));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private function getRequest(string $currency, string $amount): TransferInCrossMarginRequest
    {
        return new TransferInCrossMarginRequest($currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): TransferInCrossMarginResponse
    {
        return new TransferInCrossMarginResponse($response);
    }
}
