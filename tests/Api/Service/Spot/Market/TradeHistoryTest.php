<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TradeHistoryRequest;
use Feralonso\Htx\Api\Response\Spot\Market\TradeHistoryResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class TradeHistoryTest extends TestCase
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

    private function getRequest(string $symbol): TradeHistoryRequest
    {
        return new TradeHistoryRequest($symbol);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): TradeHistoryResponse
    {
        return new TradeHistoryResponse($response);
    }
}
