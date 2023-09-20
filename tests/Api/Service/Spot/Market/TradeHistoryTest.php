<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TradeHistoryRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class TradeHistoryTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TradeHistoryRequest($symbol);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['symbol'],
        ];
    }
}
