<?php

namespace Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\LedgerRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class LedgerTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new LedgerRequest();
        $request->validate();
    }
}
