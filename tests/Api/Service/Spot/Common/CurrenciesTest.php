<?php

namespace Feralonso\Tests\Api\Service\Spot\Common;

use Feralonso\Htx\Api\Request\Spot\Common\CurrenciesRequest;
use Feralonso\Htx\Api\Response\Spot\Common\CurrenciesResponse;
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

        $this->getRequest()->validate();
    }

    /**
     * @throws HtxValidateException
     */
    public function testInvalidate(): void
    {
        $this->expectException(HtxValidateException::class);

        $request = $this->getRequest();
        $request->setTs('word');
        $request->validate();
    }

    private function getRequest(): CurrenciesRequest
    {
        return new CurrenciesRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): CurrenciesResponse
    {
        return new CurrenciesResponse($response);
    }
}
