<?php

namespace Feralonso\Tests\Api\Service\Spot\Trading;

use Feralonso\Htx\Api\Request\Spot\Trading\FeeRequest;
use Feralonso\Htx\Api\Response\Spot\Trading\FeeResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;
use Feralonso\Tests\Helper\ValueHelper;

class FeeTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(array $symbols): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($symbols)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [[ValueHelper::SYMBOL]],
        ];
    }

    private function getRequest(array $symbols): FeeRequest
    {
        return new FeeRequest($symbols);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): FeeResponse
    {
        return new FeeResponse($response);
    }
}
