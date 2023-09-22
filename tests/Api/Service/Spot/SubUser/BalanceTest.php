<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\BalanceRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class BalanceTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(int $subUid): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUid)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [555],
        ];
    }

    private function getRequest(int $subUid): BalanceRequest
    {
        return new BalanceRequest($subUid);
    }
}
