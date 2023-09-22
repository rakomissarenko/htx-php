<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\TransferRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class TransferTest extends TestCase
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
        $this->expectNotToPerformAssertions();

        $this->getRequest($fromUser, $fromAccountType, $fromAccount, $toUser, $toAccountType, $toAccount, $currency, $amount)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['111', 'from', '112', '222', 'to', '223', ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private function getRequest(
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
}
