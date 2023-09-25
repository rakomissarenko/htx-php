<?php

namespace Feralonso\Tests\Api\Service\Spot\MarginLoan;

use Feralonso\Htx\Api\Request\Spot\MarginLoan\OrdersCrossRequest;
use Feralonso\Htx\Api\Response\Spot\MarginLoan\OrdersCrossResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class OrdersCrossTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $currency, string $amount): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($currency, $amount)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::CURRENCY, ValueHelper::AMOUNT],
        ];
    }

    private function getRequest(string $currency, string $amount): OrdersCrossRequest
    {
        return new OrdersCrossRequest($currency, $amount);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): OrdersCrossResponse
    {
        return new OrdersCrossResponse($response);
    }
}
