<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Data\OrderData;
use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Trading\CreateBatchRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CreateBatchTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $orderData = new OrderData('111', 'symbol', EnumHelper::ORDER_TYPE_BUY_LIMIT, 'clientOrderId');
        $request = new CreateBatchRequest();
        $request->addOrder($orderData);
        $request->validate();
    }
}
