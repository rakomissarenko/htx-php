<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelAllAfterRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CancelAllAfterTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(int $timeout): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($timeout)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [15],
        ];
    }

    private function getRequest(int $timeout): CancelAllAfterRequest
    {
        return new CancelAllAfterRequest($timeout);
    }
}
