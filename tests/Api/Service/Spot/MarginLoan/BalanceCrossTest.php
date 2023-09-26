<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\BalanceCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\BalanceCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class BalanceCrossTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->validateRequest(self::getRequest());
    }

    private static function getRequest(): BalanceCrossRequest
    {
        return new BalanceCrossRequest();
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): BalanceCrossResponse
    {
        return new BalanceCrossResponse($response);
    }
}
