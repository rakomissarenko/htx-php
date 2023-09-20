<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyModifyRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
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

        $request = new ApiKeyModifyRequest($subUid, $accessKey, $note, $permissions);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['555', 'accessKey', 'note', [EnumHelper::PERMISSION_KEY_READ_ONLY]],
        ];
    }
}
