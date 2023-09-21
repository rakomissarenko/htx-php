<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\DetailRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class DetailTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($symbol)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['symbol'],
        ];
    }

    private function getRequest(string $symbol): DetailRequest
    {
        return new DetailRequest($symbol);
    }
}
