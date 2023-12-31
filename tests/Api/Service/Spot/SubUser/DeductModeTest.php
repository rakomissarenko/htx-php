<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\DeductModeRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\DeductModeResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class DeductModeTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $subUids, string $deductMode): void
    {
        $this->validateRequest(self::getRequest($subUids, $deductMode));
    }

    public function validateProvider(): array
    {
        return [
            [[ValueHelper::SUB_UID], EnumHelper::DEDUCT_MODE_MASTER],
        ];
    }

    private static function getRequest(array $subUids, string $deductMode): DeductModeRequest
    {
        return new DeductModeRequest($subUids, $deductMode);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): DeductModeResponse
    {
        return new DeductModeResponse($response);
    }
}
