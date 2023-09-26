<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Data\OrderData;
use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Trading\CreateBatchRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\CreateBatchResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class CreateBatchTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId, string $symbol, string $type, string $clientOrderId): void
    {
        $this->validateRequest(self::getRequest($accountId, $symbol, $type, $clientOrderId));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID, ValueHelper::SYMBOL, EnumHelper::ORDER_TYPE_BUY_LIMIT, 'clientOrderId'],
        ];
    }

    private static function getRequest(string $accountId, string $symbol, string $type, string $clientOrderId): CreateBatchRequest
    {
        $result = new CreateBatchRequest();
        $result->addOrder(new OrderData($accountId, $symbol, $type, $clientOrderId));

        return $result;
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): CreateBatchResponse
    {
        return new CreateBatchResponse($response);
    }
}
