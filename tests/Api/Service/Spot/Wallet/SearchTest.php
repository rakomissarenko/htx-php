<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Wallet\SearchRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\SearchResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Helper\FileHelper;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    private const RESPONSES_SUCCESS = [
        'Spot/Wallet/SearchDepositSuccess.json',
        'Spot/Wallet/SearchWithdrawSuccess.json',
    ];

    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $type): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($type)->validate();
    }

    /**
     * @throws HtxValidateException
     *
     * @dataProvider responseSuccessProvider
     */
    public function testResponseSuccess(string $content): void
    {
        $response = $this->getResponse($content);

        $this->assertArrayHasKey('data', $response->toArray());
    }

    public function validateProvider(): array
    {
        return [
            [EnumHelper::WALLET_TYPE_DEPOSIT],
        ];
    }

    public function responseSuccessProvider(): array
    {
        return FileHelper::getResponsesProvider(self::RESPONSES_SUCCESS);
    }

    private function getRequest(string $type): SearchRequest
    {
        return new SearchRequest($type);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): SearchResponse
    {
        return new SearchResponse($response);
    }
}
