<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Data\OrderData;
use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Trading\CreateRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\CreateResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class CreateTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId, string $symbol, string $type, string $clientOrderId): void
    {
        $this->validateRequest($this->getRequest($accountId, $symbol, $type, $clientOrderId));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID, ValueHelper::SYMBOL, EnumHelper::ORDER_TYPE_BUY_LIMIT, 'clientOrderId'],
        ];
    }

    private function getRequest(string $accountId, string $symbol, string $type, string $clientOrderId): CreateRequest
    {
        return new CreateRequest(new OrderData($accountId, $symbol, $type, $clientOrderId));
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): CreateResponse
    {
        return new CreateResponse($response);
    }
}
