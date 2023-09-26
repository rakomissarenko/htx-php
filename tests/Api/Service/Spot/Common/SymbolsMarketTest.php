<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\SymbolsMarketRequest;
use Feralonso\Htx\Api\Response\Spot\Common\SymbolsMarketResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;

class SymbolsMarketTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): SymbolsMarketRequest
    {
        return new SymbolsMarketRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): SymbolsMarketResponse
    {
        return new SymbolsMarketResponse($response);
    }
}
