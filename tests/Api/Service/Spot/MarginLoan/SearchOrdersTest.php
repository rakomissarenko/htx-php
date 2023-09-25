<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\SearchOrdersRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\SearchOrdersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class SearchOrdersTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): SearchOrdersRequest
    {
        return new SearchOrdersRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): SearchOrdersResponse
    {
        return new SearchOrdersResponse($response);
    }
}
