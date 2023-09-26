<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\DepthRequest;
use Feralonso\Htx\Api\Response\Spot\Market\DepthResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class DepthTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $symbol): void
    {
        $this->validateRequest(self::getRequest($symbol));
    }

    public function validateProvider(): array
    {
        return [
            [ValueHelper::SYMBOL],
        ];
    }

    private static function getRequest(string $symbol): DepthRequest
    {
        return new DepthRequest($symbol);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): DepthResponse
    {
        return new DepthResponse($response);
    }
}
