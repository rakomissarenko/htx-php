<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\AggregateBalanceRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\AggregateBalanceResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class AggregateBalanceTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
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
