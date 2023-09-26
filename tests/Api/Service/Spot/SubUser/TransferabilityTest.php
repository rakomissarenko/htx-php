<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\TransferabilityRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\TransferabilityResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class TransferabilityTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $subUids, string $accountType, bool $transferrable): void
    {
        $this->validateRequest(self::getRequest($subUids, $accountType, $transferrable));
    }

    public function validateProvider(): array
    {
        return [
            [[ValueHelper::SUB_UID], EnumHelper::ACCOUNT_TYPE_SPOT, true],
        ];
    }

    private static function getRequest(array $subUids, string $accountType, bool $transferrable): TransferabilityRequest
    {
        return new TransferabilityRequest($subUids, $accountType, $transferrable);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TransferabilityResponse
    {
        return new TransferabilityResponse($response);
    }
}
