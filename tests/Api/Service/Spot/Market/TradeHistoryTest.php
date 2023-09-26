<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TradeHistoryRequest;
use Feralonso\Htx\Api\Response\Spot\Market\TradeHistoryResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class TradeHistoryTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol): void
    {
        $this->validateRequest(self::getRequest($symbol));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SYMBOL],
        ];
    }

    private static function getRequest(string $symbol): TradeHistoryRequest
    {
        return new TradeHistoryRequest($symbol);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TradeHistoryResponse
    {
        return new TradeHistoryResponse($response);
    }
}
