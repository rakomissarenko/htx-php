<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayInfoRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayInfoResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class RepayInfoTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest($this->getRequest());
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
