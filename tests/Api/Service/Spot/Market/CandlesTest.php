<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Market\CandlesRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CandlesTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol, string $period): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($symbol, $period)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['symbol', EnumHelper::PERIOD_1MIN],
        ];
    }

    private function getRequest(string $symbol, string $period): CandlesRequest
    {
        return new CandlesRequest($symbol, $period);
    }
}
