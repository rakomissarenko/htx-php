<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayInfoRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayInfoResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class RepayInfoTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): RepayInfoRequest
    {
        return new RepayInfoRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): RepayInfoResponse
    {
        return new RepayInfoResponse($response);
    }
}
