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

        $request = new ApiKeyRequest($uid);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111'],
        ];
    }
}
