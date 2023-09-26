<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TradeRequest;
use Feralonso\Htx\Api\Response\Spot\Market\TradeResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class TradeTest extends AbstractTestCase
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

    private static function getRequest(string $symbol): TradeRequest
    {
        return new TradeRequest($symbol);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TradeResponse
    {
        return new TradeResponse($response);
    }
}
