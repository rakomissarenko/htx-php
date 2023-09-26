<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\AddressDepositRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\AddressDepositResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class AddressDepositTest extends AbstractTest
{
    protected const RESPONSES_SUCCESS = [
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
