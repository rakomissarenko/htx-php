<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Data\UserData;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;

class CreationRequest extends AbstractRequest
{
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
        ValidateHelper::validateNotEmptyArray($this->userList, FieldHelper::FIELD_USER_LIST);
        foreach ($this->userList as $userData) {
            $userData->validate();
        }
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_USER_LIST => array_map(static fn (UserData $userData): array => $userData->toArray(), $this->userList),
        ];
    }
}
