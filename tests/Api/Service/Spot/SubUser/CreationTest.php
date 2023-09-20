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
     */
    public function testValidate(): void
    {
        $this->expectNotToPerformAssertions();

        $userData = new UserData('username', 'note');
        $request = new CreationRequest();
        $request->addUserData($userData);
        $request->validate();
    }
}
