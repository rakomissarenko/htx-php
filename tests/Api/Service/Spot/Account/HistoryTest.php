<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\HistoryRequest;
use Feralonso\Htx\Api\Response\Spot\Account\HistoryResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class HistoryTest extends AbstractTest
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
