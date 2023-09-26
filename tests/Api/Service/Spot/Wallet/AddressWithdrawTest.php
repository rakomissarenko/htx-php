<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\AddressWithdrawRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\AddressWithdrawResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class AddressWithdrawTest extends AbstractTest
{
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
     * @dataProvider invalidateProvider
     */
    public function testInvalidate(string $currency): void
    {
        $this->expectException(HtxValidateException::class);

        $this->getRequest($currency)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY],
        ];
    }

    public function invalidateProvider(): array
    {
        return [
            [ValueHelper::EMPTY_STRING],
        ];
    }

    private function getRequest(string $currency): AddressWithdrawRequest
    {
        return new AddressWithdrawRequest($currency);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): AddressWithdrawResponse
    {
        return new AddressWithdrawResponse($response);
    }
}
