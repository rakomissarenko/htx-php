<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;

class SubUserData
{
    private ?string $uid = null;
    private ?string $userState = null;

    public static function initByArray(array $data): self
    {
        $result = new self();

        $uid = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_UID);
        if ($uid !== null) {
            $result->setUid($uid);
        }
        $userState = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_USER_STATE);
        if ($userState !== null) {
            $result->setUserState($userState);
        }

        return $result;
    }

    public function setUid(string $uid): void
    {
        $this->uid = $uid;
    }

    public function setUserState(string $userState): void
    {
        $this->userState = $userState;
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_UID                => $this->uid,
            FieldResponseHelper::FIELD_USER_STATE => $this->userState,
        ];
    }
}
