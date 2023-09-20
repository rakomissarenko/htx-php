<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CancelTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId, string $symbol): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CancelRequest($orderId, $symbol);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['orderId', 'symbol'],
        ];
    }
}
