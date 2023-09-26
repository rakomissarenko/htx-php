<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\MatchResultsOrderRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\MatchResultsOrderResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class MatchResultsOrderTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId): void
    {
        $this->validateRequest(self::getRequest($orderId));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID],
        ];
    }

    private static function getRequest(string $orderId): MatchResultsOrderRequest
    {
        return new MatchResultsOrderRequest($orderId);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): MatchResultsOrderResponse
    {
        return new MatchResultsOrderResponse($response);
    }
}
