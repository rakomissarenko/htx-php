<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\ApiKeyDeleteRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\ApiKeyDeleteResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class ApiKeyDeleteTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $accessKey): void
    {
        $this->validateRequest($this->getRequest($subUid, $accessKey));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID, 'accessKey'],
        ];
    }

    private function getRequest(string $subUid, string $accessKey): ApiKeyDeleteRequest
    {
        return new ApiKeyDeleteRequest($subUid, $accessKey);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): ApiKeyDeleteResponse
    {
        return new ApiKeyDeleteResponse($response);
    }
}
