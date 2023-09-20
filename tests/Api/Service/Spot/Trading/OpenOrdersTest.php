<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Trading\OpenOrdersRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class OpenOrdersTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId, string $symbol, string $side): void
    {
        $this->expectNotToPerformAssertions();

        $request = new OpenOrdersRequest($accountId, $symbol, $side);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111', 'symbol', EnumHelper::ORDER_SIDE_BUY],
        ];
    }
}
