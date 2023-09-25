<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\SymbolsSettingsRequest;
use Feralonso\Htx\Api\Response\Spot\Common\SymbolsSettingsResponse;
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

        $this->getRequest()->validate();
    }

    private function getRequest(): SymbolsSettingsRequest
    {
        return new SymbolsSettingsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): SymbolsSettingsResponse
    {
        return new SymbolsSettingsResponse($response);
    }
}
