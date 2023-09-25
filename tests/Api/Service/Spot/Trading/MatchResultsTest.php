<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\MatchResultsRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\MatchResultsResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class MatchResultsTest extends TestCase
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
