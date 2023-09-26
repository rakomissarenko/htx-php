<?php

namespace Feralonso\Tests\Api\Service;

use Feralonso\Tests\Helper\FileHelper;
use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase
{
    protected const RESPONSES_SUCCESS = [];

    public function responseSuccessProvider(): array
    {
        return FileHelper::getResponsesProvider(static::RESPONSES_SUCCESS);
    }
}
