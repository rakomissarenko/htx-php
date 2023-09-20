<?php

namespace Feralonso\Tests\Api\Service\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\CreateRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CreateRequest(111, 'symbol', EnumHelper::ORDER_SIDE_BUY, EnumHelper::ORDER_BID_TYPE_MARKET, '222');
        $request->validate();
    }
}
