<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyCreateRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
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

        $request = new ApiKeyCreateRequest($otpToken, $subUid, $note, $permissions);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['9999', '555', 'note', [EnumHelper::PERMISSION_KEY_READ_ONLY]],
        ];
    }
}
