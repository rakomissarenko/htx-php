<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\BalanceCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\BalanceCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class BalanceCrossTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest($this->getRequest());
    }

    private function getRequest(): BalanceCrossRequest
    {
        return new BalanceCrossRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): BalanceCrossResponse
    {
        return new BalanceCrossResponse($response);
    }
}
