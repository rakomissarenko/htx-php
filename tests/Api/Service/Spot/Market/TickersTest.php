<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TickersRequest;
use Feralonso\Htx\Api\Response\Spot\Market\TickersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class TickersTest extends AbstractTestCase
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

    private static function getRequest(): TickersRequest
    {
        return new TickersRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TickersResponse
    {
        return new TickersResponse($response);
    }
}
