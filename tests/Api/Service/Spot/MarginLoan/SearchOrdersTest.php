<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\SearchOrdersRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\SearchOrdersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class SearchOrdersTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): SearchOrdersRequest
    {
        return new SearchOrdersRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): SearchOrdersResponse
    {
        return new SearchOrdersResponse($response);
    }
}
