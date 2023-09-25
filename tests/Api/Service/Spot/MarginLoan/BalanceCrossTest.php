<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\BalanceCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\BalanceCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class BalanceCrossTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
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
