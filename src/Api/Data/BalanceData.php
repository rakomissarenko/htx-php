<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;

class BalanceData
{
    private const ZERO = '0';

    private ?string $available = null;

    /**
     * The balance in the main currency unit
     */
    private ?string $balance = null;

    /**
     * The currency of this balance
     */
    private ?string $currency = null;

    private ?string $debt = null;

    /**
     * Serial number of account change
     */
    private ?string $seqNum = null;

    /**
     * The balance type
     */
    private ?string $type = null;

    public static function initByArray(array $data): self
    {
        $result = new self();

        $available = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_AVAILABLE);
        if ($available !== null) {
            $result->setAvailable($available);
        }
        $balance = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_BALANCE);
        if ($balance !== null) {
            $result->setBalance($balance);
        }
        $currency = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_CURRENCY);
        if ($currency !== null) {
            $result->setCurrency($currency);
        }
        $debt = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_DEBT);
        if ($debt !== null) {
            $result->setDebt($debt);
        }
        $seqNum = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_SEQ_NUM_HYPHEN);
        if ($seqNum !== null) {
            $result->setSeqNum($seqNum);
        }
        $type = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_TYPE);
        if ($type !== null) {
            $result->setType($type);
        }

        return $result;
    }

    public function getAvailable(): ?string
    {
        return $this->available;
    }

    public function setAvailable(string $available): void
    {
        $this->available = $available;
    }

    public function getBalance(): ?string
    {
        return $this->balance;
    }

    public function setBalance(string $balance): void
    {
        $this->balance = $balance;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getDebt(): ?string
    {
        return $this->debt;
    }

    public function setDebt(string $debt): void
    {
        $this->debt = $debt;
    }

    public function getSeqNum(): ?string
    {
        return $this->seqNum;
    }

    public function setSeqNum(string $seqNum): void
    {
        $this->seqNum = $seqNum;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function isNotZero(): bool
    {
        return
            ($this->balance && bccomp($this->balance, self::ZERO)) ||
            ($this->available && bccomp($this->available, self::ZERO)) ||
            ($this->debt && bccomp($this->debt, self::ZERO));
    }

    public function toArray(): array
    {
        return [
            FieldResponseHelper::FIELD_AVAILABLE      => $this->available,
            FieldResponseHelper::FIELD_BALANCE        => $this->balance,
            FieldHelper::FIELD_CURRENCY               => $this->currency,
            FieldResponseHelper::FIELD_DEBT           => $this->debt,
            FieldResponseHelper::FIELD_SEQ_NUM_HYPHEN => $this->seqNum,
            FieldHelper::FIELD_TYPE                   => $this->type,
        ];
    }
}
