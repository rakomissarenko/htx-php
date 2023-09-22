<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\TickersRequest;
use Feralonso\Htx\Api\Response\Spot\Market\TickersResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\FileHelper;
use PHPUnit\Framework\TestCase;

class TickersTest extends TestCase
{
    private const RESPONSES_SUCCESS = [
        'Spot/Market/TickersSuccess.json',
    ];

    /**
     * @throws HtxValidateException
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest()->validate();
    }

    /**
     * @throws HtxValidateException
     *
     * @dataProvider responseSuccessProvider
     */
    public function testResponseSuccess(string $content): void
    {
        $response = $this->getResponse($content);

        var_dump($response);
        $this->assertArrayHasKey('data', $response->toArray());
    }

    public function responseSuccessProvider(): array
    {
        return FileHelper::getResponsesProvider(self::RESPONSES_SUCCESS);
    }

    private function getRequest(): TickersRequest
    {
        return new TickersRequest();
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): TickersResponse
    {
        return new TickersResponse($response);
    }
}
