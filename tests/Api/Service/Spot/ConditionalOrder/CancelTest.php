<?php

namespace Feralonso\Tests\Api\Service\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\CancelRequest;
use Feralonso\Htx\Api\Response\Spot\ConditionalOrder\CancelResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;

class CancelTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $clientOrderIds): void
    {
        $this->validateRequest(self::getRequest($clientOrderIds));
    }

    public function validateProvider(): array
    {
        return [
            [['111', '222']],
        ];
    }

    private static function getRequest(array $clientOrderIds): CancelRequest
    {
        return new CancelRequest($clientOrderIds);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): CancelResponse
    {
        return new CancelResponse($response);
    }
}
