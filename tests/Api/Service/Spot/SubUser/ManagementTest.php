<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ManagementRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\ManagementResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;
use Feralonso\Tests\Helper\ValueHelper;

class ManagementTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $action): void
    {
        $this->validateRequest(self::getRequest($subUid, $action));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID, EnumHelper::ACTION_LOCK],
        ];
    }

    private static function getRequest(string $subUid, string $action): ManagementRequest
    {
        return new ManagementRequest($subUid, $action);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): ManagementResponse
    {
        return new ManagementResponse($response);
    }
}
