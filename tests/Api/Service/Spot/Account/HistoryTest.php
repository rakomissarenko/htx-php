<?php

namespace Feralonso\Tests\Api\Service\Spot\Account;

use Feralonso\Htx\Api\Request\Spot\Account\HistoryRequest;
use Feralonso\Htx\Api\Response\Spot\Account\HistoryResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class HistoryTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): HistoryRequest
    {
        return new HistoryRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): HistoryResponse
    {
        return new HistoryResponse($response);
    }
}
