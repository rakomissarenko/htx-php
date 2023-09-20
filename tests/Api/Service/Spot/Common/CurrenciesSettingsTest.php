<?php

namespace Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\CurrenciesSettingsRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CurrenciesSettingsTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CurrenciesSettingsRequest();
        $request->validate();
    }
}
