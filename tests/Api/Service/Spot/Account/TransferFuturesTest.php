<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Account\TransferFuturesRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class TransferFuturesTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TransferFuturesRequest(ValueHelper::CURRENCY, '100', EnumHelper::TRANSFER_FUTURES_TYPE_FUTURES_TO_PRO);
        $request->validate();
    }
}
