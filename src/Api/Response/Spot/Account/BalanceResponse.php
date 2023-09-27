<?php

namespace Feralonso\Htx\Api\Response\Spot\Account;

use Feralonso\Htx\Api\Data\BalanceData;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class BalanceResponse extends AbstractResponse
{
    /**
     * @var BalanceData[]
     */
    private array $balances = [];
    private ?string $id = null;
    private ?string $state = null;
    private ?string $type = null;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $data = FormatHelper::getArrayValueInArray($responseArray, self::FIELD_DATA);
        if ($data) {
            $this->id = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_ID);
            $this->state = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_STATE);
            $this->type = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_TYPE);

            $list = FormatHelper::getArrayValueInArray($data, FieldResponseHelper::FIELD_LIST);
            if ($list) {
                foreach ($data as $balanceData) {
                    if (is_array($balanceData)) {
                        $this->balances[] = BalanceData::initByArray($balanceData);
                    }
                }
            }
        }
    }

    public function getBalances(): array
    {
        return $this->balances;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}
