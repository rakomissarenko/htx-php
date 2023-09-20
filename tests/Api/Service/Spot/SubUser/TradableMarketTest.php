<?php

namespace Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\TradableMarketRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class TradableMarketTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TradableMarketRequest(['555'], EnumHelper::ACCOUNT_MARKET_TYPE_CROSS, EnumHelper::ACTIVATION_ACTIVATED);
        $request->validate();
    }
}
