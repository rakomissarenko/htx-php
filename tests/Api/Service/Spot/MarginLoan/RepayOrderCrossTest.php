<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\RepayOrderCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\RepayOrderCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class RepayOrderCrossTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $orderId, string $amount): void
    {
        $this->validateRequest(self::getRequest($orderId, $amount));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::ACCOUNT_ID, ValueHelper::AMOUNT],
        ];
    }

    private static function getRequest(string $orderId, string $amount): RepayOrderCrossRequest
    {
        return new RepayOrderCrossRequest($orderId, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): RepayOrderCrossResponse
    {
        return new RepayOrderCrossResponse($response);
    }
}
