<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\AddressDepositRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\AddressDepositResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class AddressDepositTest extends AbstractTestCase
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
        $this->validateRequest(self::getRequest($currency));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY],
        ];
    }

    private static function getRequest(string $currency): AddressDepositRequest
    {
        return new AddressDepositRequest($currency);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): AddressDepositResponse
    {
        return new AddressDepositResponse($response);
    }
}
