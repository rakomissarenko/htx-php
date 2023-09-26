<?php

namespace Feralonso\Tests\Api\Service\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\CancelRequest;
use Feralonso\Htx\Api\Response\Spot\ConditionalOrder\CancelResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class CancelTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $clientOrderIds): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($clientOrderIds)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [['111', '222']],
        ];
    }

    private function getRequest(array $clientOrderIds): CancelRequest
    {
        return new CancelRequest($clientOrderIds);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): CancelResponse
    {
        return new CancelResponse($response);
    }
}
