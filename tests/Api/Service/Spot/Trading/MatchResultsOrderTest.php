<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\MatchResultsOrderRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\MatchResultsOrderResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class MatchResultsOrderTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId): void
    {
        $this->validateRequest($this->getRequest($orderId));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID],
        ];
    }

    private function getRequest(string $orderId): MatchResultsOrderRequest
    {
        return new MatchResultsOrderRequest($orderId);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): MatchResultsOrderResponse
    {
        return new MatchResultsOrderResponse($response);
    }
}
