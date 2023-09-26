<?php

namespace Feralonso\Tests\Api\Service\Spot\ConditionalOrder;

use Feralonso\Htx\Api\Request\Spot\ConditionalOrder\HistoryRequest;
use Feralonso\Htx\Api\Response\Spot\ConditionalOrder\HistoryResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class HistoryTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(int $accountId, string $symbol): void
    {
        $this->validateRequest(self::getRequest($accountId, $symbol));
    }

    public function validateProvider(): array
    {
        return [
            [111, ValueHelper::SYMBOL],
        ];
    }

    private static function getRequest(int $accountId, string $symbol): HistoryRequest
    {
        return new HistoryRequest($accountId, $symbol);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): HistoryResponse
    {
        return new HistoryResponse($response);
    }
}
