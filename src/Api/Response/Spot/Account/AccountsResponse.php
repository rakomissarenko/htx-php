<?php

namespace Feralonso\Htx\Api\Response\Spot\Account;

use Feralonso\Htx\Api\Data\AccountData;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class AccountsResponse extends AbstractResponse
{
    /**
     * @var AccountData[]
     */
    private array $accounts = [];

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        foreach ($data as $accountData) {
            if (is_array($accountData)) {
                $this->accounts[] = AccountData::initByArray($accountData);
            }
        }
    }

    public function getAccounts(): array
    {
        return $this->accounts;
    }

    public function getAccountByType(string $type): ?AccountData
    {
        $result = null;

        $accountData = reset($this->accounts);
        while ($result === null && $accountData !== false) {
            if ($accountData->getType() === $type) {
                $result = $accountData;
            }
            $accountData = next($this->accounts);
        }

        return $result;
    }
}
