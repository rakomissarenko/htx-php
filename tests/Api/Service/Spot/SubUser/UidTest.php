<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\UidRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\UidResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class UidTest extends TestCase
{
    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    private function getRequest(): UidRequest
    {
        return new UidRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): UidResponse
    {
        return new UidResponse($response);
    }
}
