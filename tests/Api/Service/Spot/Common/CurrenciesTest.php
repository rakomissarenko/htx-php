<?php

namespace Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\CurrenciesRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CurrenciesTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new CurrenciesRequest();
        $request->validate();
    }

    /**
     * @throws HtxValidateException
     */
    public function testInvalidate(): void
    {
        $this->expectException(HtxValidateException::class);

        $request = new CurrenciesRequest();
        $request->setTs('word');
        $request->validate();
    }
}
