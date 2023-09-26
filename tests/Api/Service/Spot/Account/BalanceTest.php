<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\BalanceRequest;
use Feralonso\Htx\Api\Response\Spot\Account\BalanceResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class BalanceTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($accountId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID],
        ];
    }

    private function getRequest(string $accountId): BalanceRequest
    {
        return new BalanceRequest($accountId);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): BalanceResponse
    {
        return new BalanceResponse($response);
    }
}
