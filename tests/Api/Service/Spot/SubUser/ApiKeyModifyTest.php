<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyModifyRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\ApiKeyModifyResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class ApiKeyModifyTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $accessKey, string $note, array $permissions): void
    {
        $this->validateRequest(self::getRequest($subUid, $accessKey, $note, $permissions));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID, 'accessKey', 'note', [EnumHelper::PERMISSION_KEY_READ_ONLY]],
        ];
    }

    private static function getRequest(string $subUid, string $accessKey, string $note, array $permissions): ApiKeyModifyRequest
    {
        return new ApiKeyModifyRequest($subUid, $accessKey, $note, $permissions);
    }

    /**
     * @throws HtxValidateException
     */
    private static function getResponse(string $response): ApiKeyModifyResponse
    {
        return new ApiKeyModifyResponse($response);
    }
}
