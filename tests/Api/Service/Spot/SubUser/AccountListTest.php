<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\AccountListRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\AccountListResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;
use Feralonso\Tests\Helper\ValueHelper;

class AccountListTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid): void
    {
        $this->validateRequest(self::getRequest($subUid));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID],
        ];
    }

    private static function getRequest(string $subUid): AccountListRequest
    {
        return new AccountListRequest($subUid);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): AccountListResponse
    {
        return new AccountListResponse($response);
    }
}
