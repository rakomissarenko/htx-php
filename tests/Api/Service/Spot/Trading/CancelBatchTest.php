<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelBatchRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CancelBatchTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $orderIds): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CancelBatchRequest();
        $request->setOrderIds($orderIds);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            [['111']],
        ];
    }
}
