<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\MatchResultsRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class MatchResultsTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $request = new MatchResultsRequest();
        $request->validate();
    }
}