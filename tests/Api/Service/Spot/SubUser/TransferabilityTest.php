<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\TransferabilityRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\TransferabilityResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class TransferabilityTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $subUids, string $accountType, bool $transferrable): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUids, $accountType, $transferrable)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [[ValueHelper::SUB_UID], EnumHelper::ACCOUNT_TYPE_SPOT, true],
        ];
    }

    private function getRequest(array $subUids, string $accountType, bool $transferrable): TransferabilityRequest
    {
        return new TransferabilityRequest($subUids, $accountType, $transferrable);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): TransferabilityResponse
    {
        return new TransferabilityResponse($response);
    }
}
