<?php

namespace Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CancelTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CancelRequest('orderId', 'symbol');
        $request->validate();
    }
}
