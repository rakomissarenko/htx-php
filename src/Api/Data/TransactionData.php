<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;

class TransactionData
{
    /**
     * The deposit or withdraw target address
     */
    private ?string $address = null;

    private ?string $addressId = null;

    /**
     * The user defined address tag
     */
    private ?string $addressTag = null;

    /**
     * The number of crypto asset transferred in its minimum unit
     */
    private ?string $amount = null;

    /**
     * Blockchain name
     */
    private ?string $chain = null;

    /**
     * The timestamp in milliseconds for the transfer creation
     */
    private ?string $createdAt = null;

    /**
     * Cryptocurrency
     */
    private ?string $currency = null;

    private ?string $errorCode = null;
    private ?string $errorMsg = null;
    private ?string $fee = null;
    private ?string $fromAddrTag = null;

    /**
     * Transfer id
     */
    private ?string $id = null;

    private ?string $requestId = null;
    private ?string $state = null;
    private ?string $subType = null;

    /**
     * The on-chain transaction hash.
     * If this is a "fast withdraw", then it is not on-chain transfer, and this value is empty.
     */
    private ?string $txHash = null;

    /**
     * Transfer type
     */
    private ?string $type = null;

    /**
     * The timestamp in milliseconds for the transfer's latest update
     */
    private ?string $updatedAt = null;

    private ?int $walletConfirm = null;

    public static function initByArray(array $data): self
    {
        $result = new self();

        $address = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_ADDRESS);
        if ($address !== null) {
            $result->setAddress($address);
        }
        $addressId = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_ADDRESS_ID_HYPHEN);
        if ($addressId !== null) {
            $result->setAddressId($addressId);
        }
        $addressTag = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_ADDRESS_TAG_HYPHEN);
        if ($addressTag !== null) {
            $result->setAddressTag($addressTag);
        }
        $amount = FormatHelper::getNumericValueInArray($data, FieldHelper::FIELD_AMOUNT);
        if ($amount !== null) {
            $result->setAmount($amount);
        }
        $chain = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_CHAIN);
        if ($chain !== null) {
            $result->setChain($chain);
        }
        $createdAt = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_CREATED_AT_HYPHEN);
        if ($createdAt === null) {
            $createdAt = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_CREATE_TIME);
        }
        if ($createdAt !== null) {
            $result->setCreatedAt($createdAt);
        }
        $currency = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_CURRENCY);
        if ($currency !== null) {
            $result->setCurrency($currency);
        }
        $errorCode = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_ERROR_CODE_HYPHEN);
        if ($errorCode !== null) {
            $result->setErrorCode($errorCode);
        }
        $errorMsg = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_ERROR_MSG_HYPHEN);
        if ($errorMsg !== null) {
            $result->setErrorMsg($errorMsg);
        }
        $fee = FormatHelper::getNumericValueInArray($data, FieldHelper::FIELD_FEE);
        if ($fee !== null) {
            $result->setFee($fee);
        }
        $fromAddrTag = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_FROM_ADDR_TAG);
        if ($fromAddrTag !== null) {
            $result->setFromAddrTag($fromAddrTag);
        }
        $id = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_ID);
        if ($id !== null) {
            $result->setId($id);
        }
        $requestId = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_REQUEST_ID_HYPHEN);
        if ($requestId !== null) {
            $result->setRequestId($requestId);
        }
        $state = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_STATE);
        if ($state !== null) {
            $result->setState($state);
        }
        $subType = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_SUB_TYPE_HYPHEN);
        if ($subType !== null) {
            $result->setSubType($subType);
        }
        $txHash = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_TX_HASH_HYPHEN);
        if ($txHash === null) {
            $txHash = FormatHelper::getStringValueInArray($data, FieldResponseHelper::FIELD_TX_HASH);
        }
        if ($txHash !== null) {
            $result->setTxHash($txHash);
        }
        $type = FormatHelper::getStringValueInArray($data, FieldHelper::FIELD_TYPE);
        if ($type !== null) {
            $result->setType($type);
        }
        $updatedAt = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_UPDATED_AT_HYPHEN);
        if ($updatedAt === null) {
            $updatedAt = FormatHelper::getNumericValueInArray($data, FieldResponseHelper::FIELD_UPDATE_TIME);
        }
        if ($updatedAt !== null) {
            $result->setUpdatedAt($updatedAt);
        }
        $walletConfirm = FormatHelper::getIntValueInArray($data, FieldResponseHelper::FIELD_WALLET_CONFIRM_HYPHEN);
        if ($walletConfirm !== null) {
            $result->setWalletConfirm($walletConfirm);
        }

        return $result;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getAddressId(): ?string
    {
        return $this->addressId;
    }

    public function setAddressId(string $addressId): void
    {
        $this->addressId = $addressId;
    }

    public function getAddressTag(): ?string
    {
        return $this->addressTag;
    }

    public function setAddressTag(string $addressTag): void
    {
        $this->addressTag = $addressTag;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    public function getChain(): ?string
    {
        return $this->chain;
    }

    public function setChain(string $chain): void
    {
        $this->chain = $chain;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function setErrorCode(string $errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    public function getErrorMsg(): ?string
    {
        return $this->errorMsg;
    }

    public function setErrorMsg(string $errorMsg): void
    {
        $this->errorMsg = $errorMsg;
    }

    public function getFee(): ?string
    {
        return $this->fee;
    }

    public function setFee(string $fee): void
    {
        $this->fee = $fee;
    }

    public function getFromAddrTag(): ?string
    {
        return $this->fromAddrTag;
    }

    public function setFromAddrTag(string $fromAddrTag): void
    {
        $this->fromAddrTag = $fromAddrTag;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    public function setRequestId(string $requestId): void
    {
        $this->requestId = $requestId;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function getSubType(): ?string
    {
        return $this->subType;
    }

    public function setSubType(string $subType): void
    {
        $this->subType = $subType;
    }

    public function getTxHash(): ?string
    {
        return $this->txHash;
    }

    public function setTxHash(string $txHash): void
    {
        $this->txHash = $txHash;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getWalletConfirm(): ?int
    {
        return $this->walletConfirm;
    }

    public function setWalletConfirm(int $walletConfirm): void
    {
        $this->walletConfirm = $walletConfirm;
    }

    public function isStateSafe(): bool
    {
        return $this->state === EnumHelper::TRANSACTION_STATE_SAFE;
    }

    public function isStateWithdrawConfirmed(): bool
    {
        return $this->state === EnumHelper::TRANSACTION_STATE_WITHDRAW_CONFIRMED;
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_ADDRESS                       => $this->address,
            FieldResponseHelper::FIELD_ADDRESS_ID_HYPHEN     => $this->addressId,
            FieldResponseHelper::FIELD_ADDRESS_TAG_HYPHEN    => $this->addressTag,
            FieldHelper::FIELD_AMOUNT                        => $this->amount,
            FieldHelper::FIELD_CHAIN                         => $this->chain,
            FieldResponseHelper::FIELD_CREATED_AT_HYPHEN     => $this->createdAt,
            FieldHelper::FIELD_CURRENCY                      => $this->currency,
            FieldResponseHelper::FIELD_ERROR_CODE_HYPHEN     => $this->errorCode,
            FieldResponseHelper::FIELD_ERROR_MSG_HYPHEN      => $this->errorMsg,
            FieldHelper::FIELD_FEE                           => $this->fee,
            FieldResponseHelper::FIELD_FROM_ADDR_TAG         => $this->fromAddrTag,
            FieldResponseHelper::FIELD_ID                    => $this->id,
            FieldResponseHelper::FIELD_REQUEST_ID_HYPHEN     => $this->requestId,
            FieldHelper::FIELD_STATE                         => $this->state,
            FieldResponseHelper::FIELD_SUB_TYPE_HYPHEN       => $this->subType,
            FieldResponseHelper::FIELD_TX_HASH_HYPHEN        => $this->txHash,
            FieldHelper::FIELD_TYPE                          => $this->type,
            FieldResponseHelper::FIELD_UPDATED_AT_HYPHEN     => $this->updatedAt,
            FieldResponseHelper::FIELD_WALLET_CONFIRM_HYPHEN => $this->walletConfirm,
        ];
    }
}
