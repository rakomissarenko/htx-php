<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\AggregateBalanceRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\AggregateBalanceResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class AggregateBalanceTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest($this->getRequest());
    }

    private function getRequest(): AggregateBalanceRequest
    {
        return new AggregateBalanceRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): AggregateBalanceResponse
    {
        return new AggregateBalanceResponse($response);
    }
}
