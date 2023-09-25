<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;

class AddressData
{
    private ?string $address = null;
    private ?string $addressTag = null;
    private ?string $currency = null;
    private ?string $userId = null;

    /**
     * Blockchain name
     */
    private ?string $chain = null;

    public static function initByArray(array $data): self
    {
        $result = new self();

        $address = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_ADDRESS);
        if ($address !== null) {
            $result->setAddress($address);
        }
        $addressTag = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_ADDRESS_TAG);
        if ($addressTag !== null) {
            $result->setAddressTag($addressTag);
        }
        $currency = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_CURRENCY);
        if ($currency !== null) {
            $result->setCurrency($currency);
        }
        $userId = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_USER_ID);
        if ($userId !== null) {
            $result->setUserId($userId);
        }
        $chain = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_CHAIN);
        if ($chain !== null) {
            $result->setChain($chain);
        }

        return $result;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function setAddressTag(string $addressTag): void
    {
        $this->addressTag = $addressTag;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    public function setChain(string $chain): void
    {
        $this->chain = $chain;
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_ADDRESS             => $this->address,
            FieldResponseHelper::FIELD_ADDRESS_TAG => $this->addressTag,
            FieldHelper::FIELD_CURRENCY            => $this->currency,
            FieldResponseHelper::FIELD_USER_ID     => $this->userId,
            FieldHelper::FIELD_CHAIN               => $this->chain,
        ];
    }
}
