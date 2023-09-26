<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Data\UserData;
use Feralonso\Htx\Api\Request\Spot\SubUser\CreationRequest;
use Feralonso\Htx\Api\Response\Spot\SubUser\CreationResponse;
use Feralonso\Htx\Exceptions\HtxValidateException;
use Feralonso\Tests\Api\Service\AbstractTestCase;

class CreationTest extends AbstractTestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $userName, string $note): void
    {
        $this->validateRequest(self::getRequest($userName, $note));
    }

    public function validateProvider(): array
    {
        return [
            ['username', 'note'],
        ];
    }

    private static function getRequest(string $userName, string $note): CreationRequest
    {
        $result = new CreationRequest();
        $result->addUserData(new UserData($userName, $note));

        return $result;
    }

    /**
     * @throws HtxValidateException
     */
    protected static function getResponse(string $response): CreationResponse
    {
        return new CreationResponse($response);
    }
}
