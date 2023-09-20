<?php

namespace Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\QuotaWithdrawRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class QuotaWithdrawTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new QuotaWithdrawRequest('usdt');
        $request->validate();
    }
}
