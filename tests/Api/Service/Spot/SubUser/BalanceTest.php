<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\BalanceRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\BalanceResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class BalanceTest extends AbstractTestCase
{
    protected const RESPONSES_SUCCESS = [
        'Spot/SubUser/BalanceSuccess.json',
    ];

    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(int $subUid): void
    {
        $this->validateRequest(self::getRequest($subUid));
    }

    public function validateProvider(): array
    {
        return [
            [555],
        ];
    }

    private static function getRequest(int $subUid): BalanceRequest
    {
        return new BalanceRequest($subUid);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): BalanceResponse
    {
        return new BalanceResponse($response);
    }
}
