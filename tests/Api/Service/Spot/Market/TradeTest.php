<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TradeRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class TradeTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TradeRequest($symbol);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['symbol'],
        ];
    }
}
