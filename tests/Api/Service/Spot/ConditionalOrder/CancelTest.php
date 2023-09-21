<?php

namespace Feralonso\Tests\Api\Service\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\CancelRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CancelTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $clientOrderIds): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($clientOrderIds)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [['111', '222']],
        ];
    }

    private function getRequest(array $clientOrderIds): CancelRequest
    {
        return new CancelRequest($clientOrderIds);
    }
}
