<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Data\OrderData;
use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Trading\CreateRequest;
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
    public function testValidate(string $accountId, string $symbol, string $type, string $clientOrderId): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($accountId, $symbol, $type, $clientOrderId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111', ValueHelper::SYMBOL, EnumHelper::ORDER_TYPE_BUY_LIMIT, 'clientOrderId'],
        ];
    }

    private function getRequest(string $accountId, string $symbol, string $type, string $clientOrderId): CreateRequest
    {
        return new CreateRequest(new OrderData($accountId, $symbol, $type, $clientOrderId));
    }
}
