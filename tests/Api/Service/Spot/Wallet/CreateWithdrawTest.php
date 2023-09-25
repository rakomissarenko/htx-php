<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\CreateWithdrawRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\OrderClientResponse;
use Feralonso\Htx\Api\Response\Spot\Wallet\CreateWithdrawResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\FileHelper;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class CreateWithdrawTest extends TestCase
{
    private const RESPONSES_SUCCESS = [
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
        $this->expectNotToPerformAssertions();

        $this->getRequest($address, $currency, $amount)->validate();
    }

    /**
     * @throws HtxValidateException
     *
     * @dataProvider responseSuccessProvider
     */
    public function testResponseSuccess(string $content): void
    {
        $response = $this->getResponse($content);

        $this->assertArrayHasKey('data', $response->toArray());
    }

    public function validateProvider(): array
    {
        return [
            ['address', ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    public function responseSuccessProvider(): array
    {
        return FileHelper::getResponsesProvider(self::RESPONSES_SUCCESS);
    }

    private function getRequest(string $address, string $currency, string $amount): CreateWithdrawRequest
    {
        return new CreateWithdrawRequest($address, $currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): OrderClientResponse
    {
        return new OrderClientResponse($response);
    }
}
