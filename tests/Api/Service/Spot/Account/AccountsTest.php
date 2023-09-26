<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\AccountsRequest;
use Feralonso\Htx\Api\Response\Spot\Account\AccountsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;

class AccountsTest extends GeneralTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): AccountsRequest
    {
        return new AccountsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): AccountsResponse
    {
        return new AccountsResponse($response);
    }
}
