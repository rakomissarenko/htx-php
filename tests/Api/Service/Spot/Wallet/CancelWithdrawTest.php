<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\CancelWithdrawRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\CancelWithdrawResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class CancelWithdrawTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $withdrawId): void
    {
        $this->expectNotToPerformAssertions();

        $this->validateRequest(self::getRequest($withdrawId));
    }

    public function validateProvider(): array
    {
        return [
            ['7777'],
        ];
    }

    private static function getRequest(string $withdrawId): CancelWithdrawRequest
    {
        return new CancelWithdrawRequest($withdrawId);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): CancelWithdrawResponse
    {
        return new CancelWithdrawResponse($response);
    }
}
