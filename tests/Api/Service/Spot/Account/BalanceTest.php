<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\BalanceRequest;
use Feralonso\Htx\Api\Response\Spot\Account\BalanceResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class BalanceTest extends AbstractTestCase
{
    protected const RESPONSES_SUCCESS = [
        'Spot/Account/BalanceSuccess.json',
    ];

    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId): void
    {
        $this->validateRequest(self::getRequest($accountId));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID],
        ];
    }

    private static function getRequest(string $accountId): BalanceRequest
    {
        return new BalanceRequest($accountId);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): BalanceResponse
    {
        return new BalanceResponse($response);
    }
}
