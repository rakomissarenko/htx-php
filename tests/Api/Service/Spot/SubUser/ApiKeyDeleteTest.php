<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyDeleteRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class ApiKeyDeleteTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $accessKey): void
    {
        $this->expectNotToPerformAssertions();

        $request = new ApiKeyDeleteRequest($subUid, $accessKey);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['555', 'accessKey'],
        ];
    }
}
