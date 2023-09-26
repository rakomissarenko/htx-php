<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\InfoWithdrawRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\InfoWithdrawResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class InfoWithdrawTest extends AbstractTestCase
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
    protected static function getResponse(string $response): InfoWithdrawResponse
    {
        return new InfoWithdrawResponse($response);
    }
}
