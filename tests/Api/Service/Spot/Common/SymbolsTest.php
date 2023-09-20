<?php

namespace Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\SymbolsRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class SymbolsTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new SymbolsRequest();
        $request->validate();
    }
}
