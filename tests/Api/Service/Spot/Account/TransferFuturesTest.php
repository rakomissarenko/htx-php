<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Account\TransferFuturesRequest;
use Feralonso\Htx\Api\Response\Spot\Account\TransferFuturesResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class TransferFuturesTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency, string $amount, string $type): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($currency, $amount, $type)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY, ValueHelper::AMOUNT, EnumHelper::TRANSFER_FUTURES_TYPE_FUTURES_TO_PRO],
        ];
    }

    private function getRequest(string $currency, string $amount, string $type): TransferFuturesRequest
    {
        return new TransferFuturesRequest($currency, $amount, $type);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): TransferFuturesResponse
    {
        return new TransferFuturesResponse($response);
    }
}
