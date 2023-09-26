<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\CancelBatchRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\CancelBatchResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class CancelBatchTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $orderIds): void
    {
        $this->validateRequest(self::getRequest($orderIds));
    }

    public function validateProvider(): array
    {
        return [
            [[ValueHelper::ACCOUNT_ID]],
        ];
    }

    private static function getRequest(array $orderIds): CancelBatchRequest
    {
        $result = new CancelBatchRequest();
        $result->setOrderIds($orderIds);

        return $result;
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): CancelBatchResponse
    {
        return new CancelBatchResponse($response);
    }
}
