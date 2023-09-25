<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferOutCrossMarginRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\TransferOutCrossMarginResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class TransferOutCrossMarginTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency, string $amount): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($currency, $amount)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private function getRequest(string $currency, string $amount): TransferOutCrossMarginRequest
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
