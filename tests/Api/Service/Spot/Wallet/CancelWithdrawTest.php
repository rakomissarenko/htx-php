<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\CancelWithdrawRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\CancelWithdrawResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CancelWithdrawTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $withdrawId): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($withdrawId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['7777'],
        ];
    }

    private function getRequest(string $withdrawId): CancelWithdrawRequest
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
