<?php

namespace Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\SymbolsSettingsRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class SymbolsSettingsTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new SymbolsSettingsRequest();
        $request->validate();
    }
}
