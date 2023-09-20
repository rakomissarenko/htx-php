<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\TransferRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class TransferTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TransferRequest('111', 'from', '112', '222', 'to', '223', ValueHelper::CURRENCY, '100');
        $request->validate();
    }
}
