<?php

namespace Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyModifyRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class ApiKeyModifyTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new ApiKeyModifyRequest('555', 'accessKey', 'note', [EnumHelper::PERMISSION_KEY_READ_ONLY]);
        $request->validate();
    }
}
