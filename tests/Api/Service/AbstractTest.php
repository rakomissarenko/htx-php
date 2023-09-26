<?php

namespace Feralonso\Tests\Api\Service;

use Feralonso\Htx\Api\Request\RequestInterface;
use Feralonso\Htx\Api\Response\ResponseInterface;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\FileHelper;
use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase
{
    private const FIELD_RESPONSE_DATA = 'data';

    protected const RESPONSES_SUCCESS = [];

    /**
     * @throws HtxValidateException
     */
    protected function validateRequest(RequestInterface $request): void
    {
        $this->expectNotToPerformAssertions();

        $request->validate();
    }

    protected function checkResponse(ResponseInterface $response): void
    {
        $this->assertArrayHasKey(self::FIELD_RESPONSE_DATA, $response->toArray());
    }

    public function responseSuccessProvider(): array
    {
        return FileHelper::getResponsesProvider(static::RESPONSES_SUCCESS);
    }
}
