<?php

namespace Feralonso\Tests\Api\Service\Spot\SubUser;

use Feralonso\Htx\Api\Data\UserData;
use Feralonso\Htx\Api\Request\Spot\SubUser\CreationRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;
use PHPUnit\Framework\TestCase;

class CreationTest extends TestCase
{
    /**
     * @throws HtxValidateException
     *
     * @dataProvider validateProvider
     */
    public function testValidate(string $userName, string $note): void
    {
        $this->expectNotToPerformAssertions();

        $this->getRequest($userName, $note)->validate();
    }

    public function validateProvider(): array
    {
        return [
            ['username', 'note'],
        ];
    }

    private function getRequest(string $userName, string $note): CreationRequest
    {
        $result = new CreationRequest();
        $result->addUserData(new UserData($userName, $note));

        return $result;
    }
}
