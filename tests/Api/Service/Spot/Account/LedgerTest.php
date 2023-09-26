<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\LedgerRequest;
use Feralonso\Htx\Api\Response\Spot\Account\LedgerResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;

class LedgerTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): LedgerRequest
    {
        return new LedgerRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): LedgerResponse
    {
        return new LedgerResponse($response);
    }
}
