<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\SearchOrdersCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\SearchOrdersCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class SearchOrdersCrossTest extends AbstractTestCase
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
    protected static function getResponse(string $response): SearchOrdersCrossResponse
    {
        return new SearchOrdersCrossResponse($response);
    }
}
