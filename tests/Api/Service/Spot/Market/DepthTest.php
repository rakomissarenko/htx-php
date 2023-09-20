<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\DepthRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class DepthTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol): void
    {
        $this->expectNotToPerformAssertions();

        $request = new DepthRequest($symbol);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['symbol'],
        ];
    }
}
