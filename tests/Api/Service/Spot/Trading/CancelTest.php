<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
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

        $this->getRequest($orderId, $symbol)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['orderId', ValueHelper::SYMBOL],
        ];
    }

    private function getRequest(string $orderId, string $symbol): CancelRequest
    {
        return new CancelRequest($orderId, $symbol);
    }
}
