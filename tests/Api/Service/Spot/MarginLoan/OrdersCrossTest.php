<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersCrossRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class OrdersCrossTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new OrdersCrossRequest(ValueHelper::CURRENCY, '100');
        $request->validate();
    }
}
