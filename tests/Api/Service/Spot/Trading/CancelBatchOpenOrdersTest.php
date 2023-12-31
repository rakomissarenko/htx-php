<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelBatchOpenOrdersRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelBatchOpenOrdersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class CancelBatchOpenOrdersTest extends AbstractTestCase
{
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

    private static function getRequest(string $accountId): CancelBatchOpenOrdersRequest
    {
        return new CancelBatchOpenOrdersRequest($accountId);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): CancelBatchOpenOrdersResponse
    {
        return new CancelBatchOpenOrdersResponse($response);
    }
}
