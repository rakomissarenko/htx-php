<?php

namespace Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\TransferRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class TransferTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TransferRequest('111', 'from', '112', '222', 'to', '223', 'usdt', '100');
        $request->validate();
    }
}
