<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Data\UserData;
use Feralonso\Htx\Api\Request\AbstractRequest;

class CreationRequest extends AbstractRequest
{
    private const FIELD_USER_LIST = 'userList';

    protected const PATH = '/v2/sub-user/creation';
    protected const PERMISSION = self::PERMISSION_TRADE;

    /** @var UserData[] */
    private array $userList = [];

    public function addUserData(UserData $userData): void
    {
        $this->userList[] = $userData;
    }

    public function validate(): void
    {
        if (!$this->userList) {
            $this->throwValidateException(self::FIELD_USER_LIST);
        }
        foreach ($this->userList as $userData) {
            $userData->validate();
        }
    }

    public function toArray(): array
    {
        return [
            self::FIELD_USER_LIST => array_map(static fn (UserData $userData): array => $userData->toArray(), $this->userList),
        ];
    }
}
