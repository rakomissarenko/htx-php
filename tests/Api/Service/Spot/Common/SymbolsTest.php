<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\SymbolsRequest;
use Feralonso\Htx\Api\Response\Spot\Common\SymbolsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class SymbolsTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): SymbolsRequest
    {
        return new SymbolsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): SymbolsResponse
    {
        return new SymbolsResponse($response);
    }
}
