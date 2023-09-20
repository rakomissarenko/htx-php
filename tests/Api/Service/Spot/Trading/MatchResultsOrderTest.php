<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\MatchResultsOrderRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class MatchResultsOrderTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId): void
    {
        $this->expectNotToPerformAssertions();

        $request = new MatchResultsOrderRequest($orderId);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111'],
        ];
    }
}
