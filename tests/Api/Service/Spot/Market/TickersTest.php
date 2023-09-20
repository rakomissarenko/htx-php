<?php

namespace Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TickersRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class TickersTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TickersRequest();
        $request->validate();
    }
}
