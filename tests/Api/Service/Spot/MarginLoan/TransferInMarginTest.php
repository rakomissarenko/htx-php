<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\TransferInMarginRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class TransferInMarginTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new TransferInMarginRequest('symbol', ValueHelper::CURRENCY, '100');
        $request->validate();
    }
}
