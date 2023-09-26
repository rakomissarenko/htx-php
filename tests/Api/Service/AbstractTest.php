<?php

namespace Feralonso\Tests\Api\Service;

use Feralonso\Htx\Api\Request\RequestInterface;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\FileHelper;
use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase
{
    protected const RESPONSES_SUCCESS = [];

    /**
     * @throws HtxValidateException
     */
    protected function validateRequest(RequestInterface $request): void
    {
        $this->expectNotToPerformAssertions();

        $request->validate();
    }

    public function responseSuccessProvider(): array
    {
        return FileHelper::getResponsesProvider(static::RESPONSES_SUCCESS);
    }
}
