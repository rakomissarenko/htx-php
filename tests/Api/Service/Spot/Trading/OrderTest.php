<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\OrderRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($orderId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111'],
        ];
    }

    private function getRequest(string $orderId): OrderRequest
    {
        return new OrderRequest($orderId);
    }
}
