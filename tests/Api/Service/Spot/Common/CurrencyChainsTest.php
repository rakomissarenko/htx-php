<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\CurrencyChainsRequest;
use Feralonso\Htx\Api\Response\Spot\Common\CurrencyChainsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class CurrencyChainsTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): CurrencyChainsRequest
    {
        return new CurrencyChainsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): CurrencyChainsResponse
    {
        return new CurrencyChainsResponse($response);
    }
}
