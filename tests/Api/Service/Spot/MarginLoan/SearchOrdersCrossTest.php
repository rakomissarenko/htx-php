<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\SearchOrdersCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\SearchOrdersCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class SearchOrdersCrossTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): SearchOrdersCrossRequest
    {
        return new SearchOrdersCrossRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private static function getResponse(string $response): SearchOrdersCrossResponse
    {
        return new SearchOrdersCrossResponse($response);
    }
}
