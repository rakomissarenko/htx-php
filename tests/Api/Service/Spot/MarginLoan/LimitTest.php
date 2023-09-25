<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\LimitRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LimitResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class LimitTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): LimitRequest
    {
        return new LimitRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): LimitResponse
    {
        return new LimitResponse($response);
    }
}
