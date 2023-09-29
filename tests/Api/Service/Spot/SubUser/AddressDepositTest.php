<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\AddressDepositRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\AddressDepositResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class AddressDepositTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $currency): void
    {
        $this->validateRequest(self::getRequest($subUid, $currency));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID, ValueHelper::CURRENCY],
        ];
    }

    private static function getRequest(string $subUid, string $currency): AddressDepositRequest
    {
        return new AddressDepositRequest($subUid, $currency);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): AddressDepositResponse
    {
        return new AddressDepositResponse($response);
    }
}
