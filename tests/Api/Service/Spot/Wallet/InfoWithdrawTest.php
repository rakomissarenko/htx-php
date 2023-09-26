<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\InfoWithdrawRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\InfoWithdrawResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class InfoWithdrawTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $clientOrderId): void
    {
        $this->validateRequest(self::getRequest($clientOrderId));
    }

    public function validateProvider(): array
    {
        return [
            ['clientOrderId'],
        ];
    }

    private static function getRequest(string $clientOrderId): InfoWithdrawRequest
    {
        return new InfoWithdrawRequest($clientOrderId);
    }

    /**
     * @throws HtxValidateException
     */
    private static function getResponse(string $response): InfoWithdrawResponse
    {
        return new InfoWithdrawResponse($response);
    }
}
