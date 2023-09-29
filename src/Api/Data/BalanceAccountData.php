<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;

class BalanceAccountData
{
    /**
     * Account id
     */
    private ?string $id = null;
    private ?string $state = null;
    private ?string $type = null;

    /**
     * @var BalanceData[]
     */
    private array $balances = [];

    public static function initByArray(array $data): self
    {
        $result = new self();

        $id = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_ID);
        if ($id !== null) {
            $result->setId($id);
        }
        $state = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_STATE);
        if ($state !== null) {
            $result->setState($state);
        }
        $type = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_TYPE);
        if ($type !== null) {
            $result->setType($type);
        }
        $list = FormatHelper::getArrayValueInArray($data, FieldResponseHelper::FIELD_LIST);
        if ($list) {
            foreach ($list as $balanceData) {
                if (is_array($balanceData)) {
                    $result->addBalanceData(BalanceData::initByArray($balanceData));
                }
            }
        }

        return $result;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function addBalanceData(BalanceData $balanceData): void
    {
        $this->balances[] = $balanceData;
    }

    public function toArray(): array
    {
        return [
            FieldResponseHelper::FIELD_ID   => $this->id,
            FieldHelper::FIELD_STATE        => $this->state,
            FieldHelper::FIELD_TYPE         => $this->type,
            FieldResponseHelper::FIELD_LIST =>
                array_map(static fn (BalanceData $balanceData): array => $balanceData->toArray(), $this->balances),
        ];
    }
}
