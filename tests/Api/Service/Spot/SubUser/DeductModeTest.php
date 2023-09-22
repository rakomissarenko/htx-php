<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\DeductModeRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\ValueHelper;
use PHPUnit\Framework\TestCase;

class DeductModeTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $subUids, string $deductMode): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUids, $deductMode)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [[ValueHelper::SUB_UID], EnumHelper::DEDUCT_MODE_MASTER],
        ];
    }

    private function getRequest(array $subUids, string $deductMode): DeductModeRequest
    {
        return new DeductModeRequest($subUids, $deductMode);
    }
}
