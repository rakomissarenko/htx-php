<?php

namespace Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TradeRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class TradeTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TradeRequest('symbol');
        $request->validate();
    }
}
