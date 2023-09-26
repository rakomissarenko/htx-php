<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TickerRequest;
use Feralonso\Htx\Api\Response\Spot\Market\TickerResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class TickerTest extends AbstractTestCase
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

    private static function getRequest(string $symbol): TickerRequest
    {
        return new TickerRequest($symbol);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TickerResponse
    {
        return new TickerResponse($response);
    }
}
