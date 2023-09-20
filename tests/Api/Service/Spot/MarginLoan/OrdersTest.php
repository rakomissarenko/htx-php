<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class OrdersTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new OrdersRequest('symbol', ValueHelper::CURRENCY, '100');
        $request->validate();
    }
}
