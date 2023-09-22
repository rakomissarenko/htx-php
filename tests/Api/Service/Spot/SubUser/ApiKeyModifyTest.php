<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyModifyRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class ApiKeyModifyTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $accessKey, string $note, array $permissions): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUid, $accessKey, $note, $permissions)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID, 'accessKey', 'note', [EnumHelper::PERMISSION_KEY_READ_ONLY]],
        ];
    }

    private function getRequest(string $subUid, string $accessKey, string $note, array $permissions): ApiKeyModifyRequest
    {
        return new ApiKeyModifyRequest($subUid, $accessKey, $note, $permissions);
    }
}
