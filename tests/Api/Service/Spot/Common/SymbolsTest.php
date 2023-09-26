<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\SymbolsRequest;
use Feralonso\Htx\Api\Response\Spot\Common\SymbolsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class SymbolsTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest($this->getRequest());
    }

    private function getRequest(): SymbolsRequest
    {
        return new SymbolsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): SymbolsResponse
    {
        return new SymbolsResponse($response);
    }
}
