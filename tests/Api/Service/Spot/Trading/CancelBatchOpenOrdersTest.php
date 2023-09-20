<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelBatchOpenOrdersRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CancelBatchOpenOrdersTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CancelBatchOpenOrdersRequest($accountId);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111'],
        ];
    }
}
