<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\CreateWithdrawRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\CreateWithdrawResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class CreateWithdrawTest extends AbstractTest
{
    protected const RESPONSES_SUCCESS = [
        'Spot/Wallet/CreateWithdrawFail.json',
        'Spot/Wallet/CreateWithdrawSuccess.json',
    ];

    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $address, string $currency, string $amount): void
    {
        $this->validateRequest(self::getRequest($address, $currency, $amount));
    }

    /**
     * @throws HtxValidateException
     *
     * @dataProvider responseSuccessProvider
     */
    public function testResponseSuccess(string $content): void
    {
        $response = self::getResponse($content);

        $this->checkResponse($response);
    }

    public function validateProvider(): array
    {
        return [
            ['address', ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private static function getRequest(string $address, string $currency, string $amount): CreateWithdrawRequest
    {
        return new CreateWithdrawRequest($address, $currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    private static function getResponse(string $response): CreateWithdrawResponse
    {
        return new CreateWithdrawResponse($response);
    }
}
