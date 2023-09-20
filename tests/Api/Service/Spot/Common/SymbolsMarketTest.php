<?php

namespace Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\SymbolsMarketRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class SymbolsMarketTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new SymbolsMarketRequest();
        $request->validate();
    }
}
