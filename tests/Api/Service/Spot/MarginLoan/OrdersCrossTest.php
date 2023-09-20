<?php

namespace Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersCrossRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class OrdersCrossTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new OrdersCrossRequest('usdt', '100');
        $request->validate();
    }
}
