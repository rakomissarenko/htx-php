<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\UserStateRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\UserStateResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class UserStateTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid): void
    {
        $this->validateRequest(self::getRequest($subUid));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID],
        ];
    }

    private static function getRequest(string $subUid): UserStateRequest
    {
        return new UserStateRequest($subUid);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): UserStateResponse
    {
        return new UserStateResponse($response);
    }
}
