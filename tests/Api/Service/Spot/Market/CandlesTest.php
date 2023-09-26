<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Market\CandlesRequest;
use Feralonso\Htx\Api\Response\Spot\Market\CandlesResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class CandlesTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol, string $period): void
    {
        $this->validateRequest(self::getRequest($symbol, $period));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SYMBOL, EnumHelper::PERIOD_1MIN],
        ];
    }

    private static function getRequest(string $symbol, string $period): CandlesRequest
    {
        return new CandlesRequest($symbol, $period);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): CandlesResponse
    {
        return new CandlesResponse($response);
    }
}
