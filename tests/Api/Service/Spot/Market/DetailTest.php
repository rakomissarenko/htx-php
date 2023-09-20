<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\DetailRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class DetailTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new DetailRequest('symbol');
        $request->validate();
    }
}
