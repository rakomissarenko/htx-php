<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\ApiKeyResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class ApiKeyTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $uid): void
    {
        $this->validateRequest(self::getRequest($uid));
    }

    public function validateProvider(): array
    {
        return [
            ['111'],
        ];
    }

    private static function getRequest(string $uid): ApiKeyRequest
    {
        return new ApiKeyRequest($uid);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): ApiKeyResponse
    {
        return new ApiKeyResponse($response);
    }
}
