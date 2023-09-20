<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\AccountListRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class AccountListTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid): void
    {
        $this->expectNotToPerformAssertions();

        $request = new AccountListRequest($subUid);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['555'],
        ];
    }
}
