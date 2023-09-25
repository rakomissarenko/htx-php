<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\SearchOrdersCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\SearchOrdersCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class SearchOrdersCrossTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): SearchOrdersCrossRequest
    {
        return new SearchOrdersCrossRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): SearchOrdersCrossResponse
    {
        return new SearchOrdersCrossResponse($response);
    }
}
