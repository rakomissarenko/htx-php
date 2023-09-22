<?php

namespace Feralonso\Tests\Api\Service\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\CreateRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
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

        $this->getRequest($accountId, $symbol, $orderSide, $orderType, $clientOrderId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [111, ValueHelper::SYMBOL, EnumHelper::ORDER_SIDE_BUY, EnumHelper::ORDER_BID_TYPE_MARKET, '222'],
        ];
    }

    private function getRequest(int $accountId, string $symbol, string $orderSide, string $orderType, string $clientOrderId): CreateRequest
    {
        return new CreateRequest($accountId, $symbol, $orderSide, $orderType, $clientOrderId);
    }
}
