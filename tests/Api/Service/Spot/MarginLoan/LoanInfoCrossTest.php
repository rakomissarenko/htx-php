<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\LoanInfoCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LoanInfoCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class LoanInfoCrossTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): LoanInfoCrossRequest
    {
        return new LoanInfoCrossRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private static function getResponse(string $response): LoanInfoCrossResponse
    {
        return new LoanInfoCrossResponse($response);
    }
}
