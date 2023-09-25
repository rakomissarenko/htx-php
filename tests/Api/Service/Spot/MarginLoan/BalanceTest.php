<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\BalanceRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\BalanceResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class BalanceTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): BalanceRequest
    {
        return new BalanceRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): BalanceResponse
    {
        return new BalanceResponse($response);
    }
}
