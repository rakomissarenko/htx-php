<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\DepthRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class DepthTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new DepthRequest('symbol');
        $request->validate();
    }
}
