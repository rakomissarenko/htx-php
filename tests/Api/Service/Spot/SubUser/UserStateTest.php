<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\UserStateRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\UserStateResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class UserStateTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUid)->validate();
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
