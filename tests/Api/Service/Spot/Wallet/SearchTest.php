<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Wallet\SearchRequest;
use Feralonso\Htx\Api\Response\Spot\Wallet\SearchResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class SearchTest extends AbstractTestCase
{
    protected const RESPONSES_SUCCESS = [
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
        $this->validateRequest(self::getRequest($type));
    }

    public function validateProvider(): array
    {
        return [
            [EnumHelper::WALLET_TYPE_DEPOSIT],
        ];
    }

    private static function getRequest(string $type): SearchRequest
    {
        return new SearchRequest($type);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): SearchResponse
    {
        return new SearchResponse($response);
    }
}
