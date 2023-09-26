<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\OrdersCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class OrdersCrossTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency, string $amount): void
    {
        $this->validateRequest(self::getRequest($currency, $amount));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private static function getRequest(string $currency, string $amount): OrdersCrossRequest
    {
        return new OrdersCrossRequest($currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    private static function getResponse(string $response): OrdersCrossResponse
    {
        return new OrdersCrossResponse($response);
    }
}
