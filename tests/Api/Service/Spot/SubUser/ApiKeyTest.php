<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class ApiKeyTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $uid): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($uid)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111'],
        ];
    }

    private function getRequest(string $uid): ApiKeyRequest
    {
        return new ApiKeyRequest($uid);
    }
}
