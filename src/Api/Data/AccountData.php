<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;

class AccountData
{
    /**
     * Unique account id
     */
    private ?string $id = null;

    /**
     * Account state
     */
    private ?string $state = null;

    /**
     * The type of subAccount (applicable only for isolated margin account)
     */
    private ?string $subtype = null;

    /**
     * The type of this account
     */
    private ?string $type = null;

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
        $subType = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_SUB_TYPE);
        if ($subType !== null) {
            $result->setSubtype($subType);
        }
        $type = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_TYPE);
        if ($type !== null) {
            $result->setType($type);
        }

        return $result;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function setSubtype(string $subtype): void
    {
        $this->subtype = $subtype;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function toArray(): array
    {
        return [
            FieldResponseHelper::FIELD_ID       => $this->id,
            FieldHelper::FIELD_STATE            => $this->state,
            FieldResponseHelper::FIELD_SUB_TYPE => $this->subtype,
            FieldHelper::FIELD_TYPE             => $this->type,
        ];
    }
}
