<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\QueryDepositRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\QueryDepositResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class QueryDepositTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $currency): void
    {
        $this->validateRequest(self::getRequest($subUid, $currency));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID, ValueHelper::CURRENCY],
        ];
    }

    private static function getRequest(string $subUid, string $currency): QueryDepositRequest
    {
        return new QueryDepositRequest($subUid, $currency);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): QueryDepositResponse
    {
        return new QueryDepositResponse($response);
    }
}
