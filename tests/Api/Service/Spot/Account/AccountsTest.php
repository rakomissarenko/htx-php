<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\AccountsRequest;
use Feralonso\Htx\Api\Response\Spot\Account\AccountsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class AccountsTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): AccountsRequest
    {
        return new AccountsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): AccountsResponse
    {
        return new AccountsResponse($response);
    }
}
