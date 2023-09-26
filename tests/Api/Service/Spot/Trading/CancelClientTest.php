<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelClientRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelClientResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class CancelClientTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $clientOrderId): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($clientOrderId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['clientOrderId'],
        ];
    }

    private function getRequest(string $clientOrderId): CancelClientRequest
    {
        return new CancelClientRequest($clientOrderId);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): CancelClientResponse
    {
        return new CancelClientResponse($response);
    }
}
