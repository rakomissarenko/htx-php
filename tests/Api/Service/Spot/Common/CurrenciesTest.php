<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\CurrenciesRequest;
use Feralonso\Htx\Api\Response\Spot\Common\CurrenciesResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class CurrenciesTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    /**
     * @throws HtxValidateException
     */
    public function testInvalidate(): void
    {
        $this->expectException(HtxValidateException::class);

        $request = self::getRequest();
        $request->setTs('word');
        $request->validate();
    }

    private static function getRequest(): CurrenciesRequest
    {
        return new CurrenciesRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): CurrenciesResponse
    {
        return new CurrenciesResponse($response);
    }
}
