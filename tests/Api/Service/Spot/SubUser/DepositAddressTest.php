<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\DepositAddressRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\DepositAddressResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class DepositAddressTest extends AbstractTest
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

    private static function getRequest(string $subUid, string $currency): DepositAddressRequest
    {
        return new DepositAddressRequest($subUid, $currency);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): DepositAddressResponse
    {
        return new DepositAddressResponse($response);
    }
}
