<?php

namespace Feralonso\Htx\Api\Response\Spot\SubUser;

use Feralonso\Htx\Api\Data\UserData;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class CreationResponse extends AbstractResponse
{
    /**
     * @var UserData[]
     */
    private array $users = [];

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        if ($data) {
            foreach ($data as $userData) {
                $this->users[] = UserData::initByArray($userData);
            }
        }
    }

    /**
     * @return UserData[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }
}
