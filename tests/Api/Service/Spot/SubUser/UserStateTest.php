<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\UserStateRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\UserStateResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class UserStateTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid): void
    {
        $this->validateRequest($this->getRequest($subUid));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID],
        ];
    }

    private function getRequest(string $subUid): UserStateRequest
    {
        return new UserStateRequest($subUid);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): UserStateResponse
    {
        return new UserStateResponse($response);
    }
}
