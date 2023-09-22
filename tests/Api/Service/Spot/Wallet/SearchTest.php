<?php

namespace Feralonso\Tests\Api\Service\Spot\Wallet;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Request\Spot\Wallet\SearchRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
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

    public function validateProvider(): array
    {
        return [
            [EnumHelper::WALLET_TYPE_DEPOSIT],
        ];
    }

    private function getRequest(string $type): SearchRequest
    {
        return new SearchRequest($type);
    }
}
