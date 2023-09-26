<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\BalanceRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\BalanceResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class BalanceTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): BalanceRequest
    {
        return new BalanceRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): BalanceResponse
    {
        return new BalanceResponse($response);
    }
}
