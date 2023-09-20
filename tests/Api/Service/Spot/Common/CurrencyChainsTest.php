<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\CurrencyChainsRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CurrencyChainsTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CurrencyChainsRequest();
        $request->validate();
    }
}
