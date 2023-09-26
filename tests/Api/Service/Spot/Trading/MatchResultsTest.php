<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\MatchResultsRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\MatchResultsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class MatchResultsTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): MatchResultsRequest
    {
        return new MatchResultsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): MatchResultsResponse
    {
        return new MatchResultsResponse($response);
    }
}
