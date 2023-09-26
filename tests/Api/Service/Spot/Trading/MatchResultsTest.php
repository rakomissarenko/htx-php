<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\MatchResultsRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\MatchResultsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class MatchResultsTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): MatchResultsRequest
    {
        return new MatchResultsRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): MatchResultsResponse
    {
        return new MatchResultsResponse($response);
    }
}
