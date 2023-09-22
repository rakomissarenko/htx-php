<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\DepthRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
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

        $this->getRequest($symbol)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SYMBOL],
        ];
    }

    private function getRequest(string $symbol): DepthRequest
    {
        return new DepthRequest($symbol);
    }
}
