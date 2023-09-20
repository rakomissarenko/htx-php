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

        $request = new DepositAddressRequest($subUid, $currency);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['555', ValueHelper::CURRENCY],
        ];
    }
}
