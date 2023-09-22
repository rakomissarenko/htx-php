<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\TransferabilityRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class TransferabilityTest extends TestCase
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
            [['555'], EnumHelper::ACCOUNT_TYPE_SPOT, true],
        ];
    }

    private function getRequest(array $subUids, string $accountType, bool $transferrable): TransferabilityRequest
    {
        return new TransferabilityRequest($subUids, $accountType, $transferrable);
    }
}
