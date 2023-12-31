<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\TransferRequest;
use Feralonso\Htx\Api\Response\Spot\Account\TransferResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class TransferTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(
        string $fromUser,
        string $fromAccountType,
        string $fromAccount,
        string $toUser,
        string $toAccountType,
        string $toAccount,
        string $currency,
        string $amount,
    ): void
    {
        $this->validateRequest(self::getRequest($fromUser, $fromAccountType, $fromAccount, $toUser, $toAccountType, $toAccount, $currency, $amount));
    }

    public function validateProvider(): array
    {
        return [
            ['111', 'from', '112', '222', 'to', '223', ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private static function getRequest(
        string $fromUser,
        string $fromAccountType,
        string $fromAccount,
        string $toUser,
        string $toAccountType,
        string $toAccount,
        string $currency,
        string $amount,
    ): TransferRequest
    {
        return new TransferRequest($fromUser, $fromAccountType, $fromAccount, $toUser, $toAccountType, $toAccount, $currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TransferResponse
    {
        return new TransferResponse($response);
    }
}
