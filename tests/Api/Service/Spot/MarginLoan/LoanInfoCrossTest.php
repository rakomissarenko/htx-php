<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\LoanInfoCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\LoanInfoCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class LoanInfoCrossTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): LoanInfoCrossRequest
    {
        return new LoanInfoCrossRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): LoanInfoCrossResponse
    {
        return new LoanInfoCrossResponse($response);
    }
}
