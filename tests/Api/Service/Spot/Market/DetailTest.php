<?php

namespace Feralonso\Tests\Api\Service\Spot\Market;

use Feralonso\Htx\Api\Request\Spot\Market\DetailRequest;
use Feralonso\Htx\Api\Response\Spot\Market\DetailResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\GeneralTest;
use Feralonso\Tests\Helper\ValueHelper;

class DetailTest extends GeneralTest
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

    private static function getRequest(string $symbol): DetailRequest
    {
        return new DetailRequest($symbol);
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): DetailResponse
    {
        return new DetailResponse($response);
    }
}
