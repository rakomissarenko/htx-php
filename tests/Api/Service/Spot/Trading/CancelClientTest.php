<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelClientRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CancelClientTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $clientOrderId): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CancelClientRequest($clientOrderId);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['clientOrderId'],
        ];
    }
}
