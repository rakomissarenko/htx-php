<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\AccountListRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\AccountListResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class AccountListTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUid)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID],
        ];
    }

    private function getRequest(string $subUid): AccountListRequest
    {
        return new AccountListRequest($subUid);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): AccountListResponse
    {
        return new AccountListResponse($response);
    }
}
