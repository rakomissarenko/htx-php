<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\TradableMarketRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\TradableMarketResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class TradableMarketTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $subUids, string $accountType, string $activation): void
    {
        $this->validateRequest(self::getRequest($subUids, $accountType, $activation));
    }

    public function validateProvider(): array
    {
        return [
            [[ValueHelper::SUB_UID], EnumHelper::ACCOUNT_MARKET_TYPE_CROSS, EnumHelper::ACTIVATION_ACTIVATED],
        ];
    }

    private static function getRequest(array $subUids, string $accountType, string $activation): TradableMarketRequest
    {
        return new TradableMarketRequest($subUids, $accountType, $activation);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): TradableMarketResponse
    {
        return new TradableMarketResponse($response);
    }
}
