<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Request\Spot\SubUser\BalanceRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\BalanceResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTest;

class BalanceTest extends AbstractTest
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(int $subUid): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($subUid)->validate();
    }

    public function validateProvider(): array
    {
        return [
            [555],
        ];
    }

    private function getRequest(int $subUid): BalanceRequest
    {
        return new BalanceRequest($subUid);
    }

    /**
     * @throws HtxValidateException
     */
    private function getResponse(string $response): BalanceResponse
    {
        return new BalanceResponse($response);
    }
}
