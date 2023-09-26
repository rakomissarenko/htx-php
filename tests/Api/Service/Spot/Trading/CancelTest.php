<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class CancelTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId, string $symbol): void
    {
        $this->validateRequest(self::getRequest($orderId, $symbol));
    }

    public function validateProvider(): array
    {
        return [
            ['orderId', ValueHelper::SYMBOL],
        ];
    }

    private static function getRequest(string $orderId, string $symbol): CancelRequest
    {
        return new CancelRequest($orderId, $symbol);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): CancelResponse
    {
        return new CancelResponse($response);
    }
}
