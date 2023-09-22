<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\DepositAddressRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class DepositAddressTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $subUid, string $currency): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUid, $currency)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['555', ValueHelper::CURRENCY],
        ];
    }

    private function getRequest(string $subUid, string $currency): DepositAddressRequest
    {
        return new DepositAddressRequest($subUid, $currency);
    }
}
