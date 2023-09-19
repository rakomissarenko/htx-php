<?php

namespace Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\HistoryRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class HistoryTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new HistoryRequest();
        $request->validate();
    }
}
