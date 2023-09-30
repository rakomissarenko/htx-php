<?php

namespace Feralonso\Htx\Api\Response\Spot\SubUser;

use Feralonso\Htx\Api\Data\SubUserData;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class UserListResponse extends AbstractResponse
{
    /**
     * @var SubUserData[]
     */
    private array $subUsers = [];

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        if ($data) {
            foreach ($data as $subUserData) {
                $this->subUsers[] = SubUserData::initByArray($subUserData);
            }
        }
    }

    /**
     * @return SubUserData[]
     */
    public function getSubUsers(): array
    {
        return $this->subUsers;
    }

    /**
     * @return string[]
     */
    public function getActiveUids(): array
    {
        $result = [];

        foreach ($this->subUsers as $subUser) {
            if ($subUser->isUserActive()) {
                $uid = $subUser->getUid();
                if ($uid) {
                    $result[] = $uid;
                }
            }
        }

        return $result;
    }
}
