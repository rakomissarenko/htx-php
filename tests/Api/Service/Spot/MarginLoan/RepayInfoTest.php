<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayInfoRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayInfoResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class RepayInfoTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): RepayInfoRequest
    {
        return new RepayInfoRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): RepayInfoResponse
    {
        return new RepayInfoResponse($response);
    }
}
