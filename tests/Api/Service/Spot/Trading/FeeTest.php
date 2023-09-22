<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\FeeRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
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

        $this->getRequest($symbols)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [[ValueHelper::SYMBOL]],
        ];
    }

    private function getRequest(array $symbols): FeeRequest
    {
        return new FeeRequest($symbols);
    }
}
