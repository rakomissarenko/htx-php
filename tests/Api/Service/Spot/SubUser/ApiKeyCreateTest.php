<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyCreateRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\ApiKeyCreateResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class ApiKeyCreateTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $otpToken, string $subUid, string $note, array $permissions): void
    {
        $this->validateRequest(self::getRequest($otpToken, $subUid, $note, $permissions));
    }

    public function validateProvider(): array
    {
        return [
            ['9999', ValueHelper::SUB_UID, 'note', [EnumHelper::PERMISSION_KEY_READ_ONLY]],
        ];
    }

    private static function getRequest(string $otpToken, string $subUid, string $note, array $permissions): ApiKeyCreateRequest
    {
        return new ApiKeyCreateRequest($otpToken, $subUid, $note, $permissions);
    }

    /**
     * @throws HtxValidateException
     */
    private static function getResponse(string $response): ApiKeyCreateResponse
    {
        return new ApiKeyCreateResponse($response);
    }
}
