<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\TransferRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\TransferResponse;
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
    public function testValidate(string $subUid, string $currency, string $amount, string $type, string $clientOrderId): void
    {
        $this->validateRequest(self::getRequest($subUid, $currency, $amount, $type, $clientOrderId));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID, ValueHelper::CURRENCY, ValueHelper::AMOUNT, EnumHelper::TRANSFER_TYPE_MASTER_TRANSFER_IN, 'clientOrder'],
        ];
    }

    private static function getRequest(string $subUid, string $currency, string $amount, string $type, string $clientOrderId): TransferRequest
    {
        return new TransferRequest($subUid, $currency, $amount, $type, $clientOrderId);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): TransferResponse
    {
        return new TransferResponse($response);
    }
}
