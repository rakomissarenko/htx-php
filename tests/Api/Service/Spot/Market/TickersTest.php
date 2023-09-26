<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TickersRequest;
use Feralonso\Htx\Api\Response\Spot\Market\TickersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class TickersTest extends AbstractTest
{
    protected const RESPONSES_SUCCESS = [
        'Spot/Market/TickersSuccess.json',
    ];

    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    /**
     * @throws HtxValidateException
     *
     * @dataProvider responseSuccessProvider
     */
    public function testResponseSuccess(string $content): void
    {
        $response = self::getResponse($content);

        $this->assertArrayHasKey('data', $response->toArray());
    }

    private static function getRequest(): TickersRequest
    {
        return new TickersRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private static function getResponse(string $response): TickersResponse
    {
        return new TickersResponse($response);
    }
}
