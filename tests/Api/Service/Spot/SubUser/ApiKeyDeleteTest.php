<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyDeleteRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
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

        $this->getRequest($subUid, $accessKey)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID, 'accessKey'],
        ];
    }

    private function getRequest(string $subUid, string $accessKey): ApiKeyDeleteRequest
    {
        return new ApiKeyDeleteRequest($subUid, $accessKey);
    }
}
