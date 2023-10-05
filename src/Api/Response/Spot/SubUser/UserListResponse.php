<?php

namespace Feralonso\Htx\Api\Response\Spot\SubUser;

use Feralonso\Htx\Api\Data\SubUserData;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class UserListResponse extends AbstractResponse
{
    /**
     * @var SubUserData[]
     */
    private array $subUsers = [];
    private ?string $nextId;

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
        $this->nextId = FormatHelper::getNumericValueInArray($responseArray, FieldResponseHelper::FIELD_NEXT_ID);
    }

    /**
     * @return SubUserData[]
     */
    public function getSubUsers(): array
    {
        return $this->subUsers;
    }

    public function getNextId(): ?string
    {
        return $this->nextId;
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
