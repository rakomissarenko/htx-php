<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\HistoryRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\HistoryResponse;
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
