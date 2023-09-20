<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\SubUser\DeductModeRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
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

        $request = new DeductModeRequest($subUids, $deductMode);
        $request->validate();
    }

    public function validateProvider(): array
    {
        return [
            [['555'], EnumHelper::DEDUCT_MODE_MASTER],
        ];
    }
}
