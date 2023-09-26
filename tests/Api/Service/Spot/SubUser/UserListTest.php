<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\UserListRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\UserListResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class UserListTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): UserListRequest
    {
        return new UserListRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): UserListResponse
    {
        return new UserListResponse($response);
    }
}
