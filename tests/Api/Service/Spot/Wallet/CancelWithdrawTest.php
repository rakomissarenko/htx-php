<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\CancelWithdrawRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CancelWithdrawTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $withdrawId): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CancelWithdrawRequest($withdrawId);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['7777'],
        ];
    }
}
