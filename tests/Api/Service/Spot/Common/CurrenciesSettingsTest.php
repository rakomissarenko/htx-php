<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\CurrenciesSettingsRequest;
use Feralonso\Htx\Api\Response\Spot\Common\CurrenciesSettingsResponse;
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

        $this->getRequest()->validate();
    }

    private function getRequest(): CurrenciesSettingsRequest
    {
        return new CurrenciesSettingsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): CurrenciesSettingsResponse
    {
        return new CurrenciesSettingsResponse($response);
    }
}
