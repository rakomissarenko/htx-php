<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;

class ChainQuotaData
{
    /**
     * Blockchain name
     */
    private ?string $chain = null;

    /**
     * Maximum withdraw amount in each request
     */
    private ?string $maxWithdrawAmt = null;

    /**
     * Remaining withdraw quota in the day
     */
    private ?string $remainWithdrawQuotaPerDay = null;

    /**
     * Remaining withdraw quota in the year
     */
    private ?string $remainWithdrawQuotaPerYear = null;

    /**
     * Remaining withdraw quota in total
     */
    private ?string $remainWithdrawQuotaTotal = null;

    /**
     * Maximum withdraw amount in a day
     */
    private ?string $withdrawQuotaPerDay = null;

    /**
     * Maximum withdraw amount in a year
     */
    private ?string $withdrawQuotaPerYear = null;

    /**
     * Maximum withdraw amount in total
     */
    private ?string $withdrawQuotaTotal = null;

    public static function initByArray(array $data): self
    {
        $result = new self();

        $chain = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_CHAIN);
        if ($chain !== null) {
            $result->setChain($chain);
        }
        $maxWithdrawAmt = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_MAX_WITHDRAW_AMT);
        if ($maxWithdrawAmt !== null) {
            $result->setMaxWithdrawAmt($maxWithdrawAmt);
        }
        $remainWithdrawQuotaDay = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_REMAIN_WITHDRAW_QUOTA_DAY);
        if ($remainWithdrawQuotaDay !== null) {
            $result->setRemainWithdrawQuotaPerDay($remainWithdrawQuotaDay);
        }
        $remainWithdrawQuotaYear = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_REMAIN_WITHDRAW_QUOTA_YEAR);
        if ($remainWithdrawQuotaYear !== null) {
            $result->setRemainWithdrawQuotaPerYear($remainWithdrawQuotaYear);
        }
        $remainWithdrawQuotaTotal = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_REMAIN_WITHDRAW_QUOTA_TOTAL);
        if ($remainWithdrawQuotaTotal !== null) {
            $result->setRemainWithdrawQuotaTotal($remainWithdrawQuotaTotal);
        }
        $withdrawQuotaDay = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_WITHDRAW_QUOTA_DAY);
        if ($withdrawQuotaDay !== null) {
            $result->setWithdrawQuotaPerDay($withdrawQuotaDay);
        }
        $withdrawQuotaYear = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_WITHDRAW_QUOTA_YEAR);
        if ($withdrawQuotaYear !== null) {
            $result->setWithdrawQuotaPerYear($withdrawQuotaYear);
        }
        $withdrawQuotaTotal = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_WITHDRAW_QUOTA_TOTAL);
        if ($withdrawQuotaTotal !== null) {
            $result->setWithdrawQuotaTotal($withdrawQuotaTotal);
        }

        return $result;
    }

    public function setChain(string $chain): void
    {
        $this->chain = $chain;
    }

    public function setMaxWithdrawAmt(string $maxWithdrawAmt): void
    {
        $this->maxWithdrawAmt = $maxWithdrawAmt;
    }

    public function setRemainWithdrawQuotaPerDay(string $remainWithdrawQuotaPerDay): void
    {
        $this->remainWithdrawQuotaPerDay = $remainWithdrawQuotaPerDay;
    }

    public function setRemainWithdrawQuotaPerYear(string $remainWithdrawQuotaPerYear): void
    {
        $this->remainWithdrawQuotaPerYear = $remainWithdrawQuotaPerYear;
    }

    public function setRemainWithdrawQuotaTotal(string $remainWithdrawQuotaTotal): void
    {
        $this->remainWithdrawQuotaTotal = $remainWithdrawQuotaTotal;
    }

    public function setWithdrawQuotaPerDay(string $withdrawQuotaPerDay): void
    {
        $this->withdrawQuotaPerDay = $withdrawQuotaPerDay;
    }

    public function setWithdrawQuotaPerYear(string $withdrawQuotaPerYear): void
    {
        $this->withdrawQuotaPerYear = $withdrawQuotaPerYear;
    }

    public function setWithdrawQuotaTotal(string $withdrawQuotaTotal): void
    {
        $this->withdrawQuotaTotal = $withdrawQuotaTotal;
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_CHAIN                               => $this->chain,
            FieldResponseHelper::FIELD_MAX_WITHDRAW_AMT            => $this->maxWithdrawAmt,
            FieldResponseHelper::FIELD_REMAIN_WITHDRAW_QUOTA_DAY   => $this->remainWithdrawQuotaPerDay,
            FieldResponseHelper::FIELD_REMAIN_WITHDRAW_QUOTA_YEAR  => $this->remainWithdrawQuotaPerYear,
            FieldResponseHelper::FIELD_REMAIN_WITHDRAW_QUOTA_TOTAL => $this->remainWithdrawQuotaTotal,
            FieldResponseHelper::FIELD_WITHDRAW_QUOTA_DAY          => $this->withdrawQuotaPerDay,
            FieldResponseHelper::FIELD_WITHDRAW_QUOTA_YEAR         => $this->withdrawQuotaPerYear,
            FieldResponseHelper::FIELD_WITHDRAW_QUOTA_TOTAL        => $this->withdrawQuotaTotal,
        ];
    }
}
