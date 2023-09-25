<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\HistoryRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\HistoryResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class HistoryTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): HistoryRequest
    {
        return new HistoryRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): HistoryResponse
    {
        return new HistoryResponse($response);
    }
}
