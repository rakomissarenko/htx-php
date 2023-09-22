<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\DetailRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
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
            [ValueHelper::SYMBOL],
        ];
    }

    private function getRequest(string $symbol): DetailRequest
    {
        return new DetailRequest($symbol);
    }
}
