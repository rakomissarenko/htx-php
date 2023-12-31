<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Account\TransferFuturesRequest;
use Feralonso\Htx\Api\Response\Spot\Account\TransferFuturesResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class TransferFuturesTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency, string $amount, string $type): void
    {
        $this->validateRequest(self::getRequest($currency, $amount, $type));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY, ValueHelper::AMOUNT, EnumHelper::TRANSFER_FUTURES_TYPE_FUTURES_TO_PRO],
        ];
    }

    private static function getRequest(string $currency, string $amount, string $type): TransferFuturesRequest
    {
        return new TransferFuturesRequest($currency, $amount, $type);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TransferFuturesResponse
    {
        return new TransferFuturesResponse($response);
    }
}
