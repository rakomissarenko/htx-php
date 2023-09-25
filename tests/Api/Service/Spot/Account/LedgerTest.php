<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\LedgerRequest;
use Feralonso\Htx\Api\Response\Spot\Account\LedgerResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class LedgerTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): LedgerRequest
    {
        return new LedgerRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): LedgerResponse
    {
        return new LedgerResponse($response);
    }
}
