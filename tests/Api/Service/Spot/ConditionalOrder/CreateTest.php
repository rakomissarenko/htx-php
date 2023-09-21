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
     *
     * @dataProvider validateProvider
     */
    public function testValidate(int $accountId, string $symbol, string $orderSide, string $orderType, string $clientOrderId): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CreateRequest($accountId, $symbol, $orderSide, $orderType, $clientOrderId);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            [111, 'symbol', EnumHelper::ORDER_SIDE_BUY, EnumHelper::ORDER_BID_TYPE_MARKET, '222'],
        ];
    }
}
