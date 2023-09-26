<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\ManagementRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\ManagementResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class ManagementTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $action): void
    {
        $this->validateRequest($this->getRequest($subUid, $action));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SUB_UID, EnumHelper::ACTION_LOCK],
        ];
    }

    private function getRequest(string $subUid, string $action): ManagementRequest
    {
        return new ManagementRequest($subUid, $action);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): ManagementResponse
    {
        return new ManagementResponse($response);
    }
}
