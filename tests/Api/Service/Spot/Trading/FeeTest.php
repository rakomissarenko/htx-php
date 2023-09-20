<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\FeeRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class FeeTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $symbols): void
    {
        $this->expectNotToPerformAssertions();

        $request = new FeeRequest($symbols);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            [['symbol']],
        ];
    }
}
