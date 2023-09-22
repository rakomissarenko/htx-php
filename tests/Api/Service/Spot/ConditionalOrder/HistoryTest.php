<?php

namespace Feralonso\Tests\Api\Service\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\HistoryRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class HistoryTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(int $accountId, string $symbol): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($accountId, $symbol)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [111, ValueHelper::SYMBOL],
        ];
    }

    private function getRequest(int $accountId, string $symbol): HistoryRequest
    {
        return new HistoryRequest($accountId, $symbol);
    }
}
