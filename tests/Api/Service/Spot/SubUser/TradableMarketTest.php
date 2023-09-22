<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\TradableMarketRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class TradableMarketTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $subUids, string $accountType, string $activation): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUids, $accountType, $activation)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [['555'], EnumHelper::ACCOUNT_MARKET_TYPE_CROSS, EnumHelper::ACTIVATION_ACTIVATED],
        ];
    }

    private function getRequest(array $subUids, string $accountType, string $activation): TradableMarketRequest
    {
        return new TradableMarketRequest($subUids, $accountType, $activation);
    }
}
