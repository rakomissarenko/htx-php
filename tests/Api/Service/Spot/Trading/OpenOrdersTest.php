<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Trading\OpenOrdersRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\OpenOrdersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class OpenOrdersTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $accountId, string $symbol, string $side): void
    {
        $this->validateRequest(self::getRequest($accountId, $symbol, $side));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID, ValueHelper::SYMBOL, EnumHelper::ORDER_SIDE_BUY],
        ];
    }

    private static function getRequest(string $accountId, string $symbol, string $side): OpenOrdersRequest
    {
        return new OpenOrdersRequest($accountId, $symbol, $side);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): OpenOrdersResponse
    {
        return new OpenOrdersResponse($response);
    }
}
