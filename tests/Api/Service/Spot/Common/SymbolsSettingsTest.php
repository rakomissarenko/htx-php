<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\SymbolsSettingsRequest;
use Feralonso\Htx\Api\Response\Spot\Common\SymbolsSettingsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class SymbolsSettingsTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): SymbolsSettingsRequest
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
