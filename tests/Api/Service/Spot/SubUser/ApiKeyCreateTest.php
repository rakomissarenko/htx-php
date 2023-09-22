<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyCreateRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class ApiKeyCreateTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $otpToken, string $subUid, string $note, array $permissions): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($otpToken, $subUid, $note, $permissions)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['9999', ValueHelper::SUB_UID, 'note', [EnumHelper::PERMISSION_KEY_READ_ONLY]],
        ];
    }

    private function getRequest(string $otpToken, string $subUid, string $note, array $permissions): ApiKeyCreateRequest
    {
        return new ApiKeyCreateRequest($otpToken, $subUid, $note, $permissions);
    }
}
