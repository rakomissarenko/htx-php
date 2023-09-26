<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelAllAfterRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelAllAfterResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class CancelAllAfterTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(int $timeout): void
    {
        $this->validateRequest(self::getRequest($timeout));
    }

    public function validateProvider(): array
    {
        return [
            [15],
        ];
    }

    private static function getRequest(int $timeout): CancelAllAfterRequest
    {
        return new CancelAllAfterRequest($timeout);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): CancelAllAfterResponse
    {
        return new CancelAllAfterResponse($response);
    }
}
