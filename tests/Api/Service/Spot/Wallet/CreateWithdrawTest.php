<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Request\Spot\Wallet\CreateWithdrawRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class CreateWithdrawTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CreateWithdrawRequest('address', ValueHelper::CURRENCY, '100');
        $request->validate();
    }
}
