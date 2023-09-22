<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\TransferRequest;
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
    public function testValidate(string $subUid, string $currency, string $amount, string $type, string $clientOrderId): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUid, $currency, $amount, $type, $clientOrderId)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['555', ValueHelper::CURRENCY, '100', EnumHelper::TRANSFER_TYPE_MASTER_TRANSFER_IN, 'clientOrder'],
        ];
    }

    private function getRequest(string $subUid, string $currency, string $amount, string $type, string $clientOrderId): TransferRequest
    {
        return new TransferRequest($subUid, $currency, $amount, $type, $clientOrderId);
    }
}
