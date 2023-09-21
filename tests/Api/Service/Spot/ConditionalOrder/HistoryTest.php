<?php

namespace Feralonso\Tests\Api\Service\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\HistoryRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
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

        $request = new HistoryRequest($accountId, $symbol);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            [111, 'symbol'],
        ];
    }
}
