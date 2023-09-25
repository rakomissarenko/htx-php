<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\AddressDepositRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\AddressDepositResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\FileHelper;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class AddressDepositTest extends TestCase
{
    private const RESPONSES_SUCCESS = [
        'Spot/Wallet/AddressDepositSuccess.json',
    ];

    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($currency)->validate();
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
            [ValueHelper::CURRENCY],
        ];
    }

    public function responseSuccessProvider(): array
    {
        return FileHelper::getResponsesProvider(self::RESPONSES_SUCCESS);
    }

    private function getRequest(string $currency): AddressDepositRequest
    {
        return new AddressDepositRequest($currency);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): AddressDepositResponse
    {
        return new AddressDepositResponse($response);
    }
}
