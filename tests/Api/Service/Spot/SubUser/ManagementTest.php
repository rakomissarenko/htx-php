<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ManagementRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class ManagementTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $action): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUid, $action)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['555', EnumHelper::ACTION_LOCK],
        ];
    }

    private function getRequest(string $subUid, string $action): ManagementRequest
    {
        return new ManagementRequest($subUid, $action);
    }
}
