<?php

namespace Feralonso\Htx\Api\Response\Spot\Wallet;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldResponseHelper;
use Feralonso\Htx\Api\Helper\FormatHelper;
use Feralonso\Htx\Api\Response\AbstractResponse;

class CreateWithdrawResponse extends AbstractResponse
{
    private ?string $errorCode;
    private ?string $errorMessage;
    private ?string $status;
    private ?string $transferId;

    public function __construct(string $response)
    {
        parent::__construct($response);

        $responseArray = $this->toArray();

        $this->errorCode = FormatHelper::getStringValueInArray($responseArray, FieldResponseHelper::FIELD_ERR_CODE_HYPHEN);
        $this->errorMessage = FormatHelper::getStringValueInArray($responseArray, FieldResponseHelper::FIELD_ERR_MSG_HYPHEN);
        $this->status = FormatHelper::getStringValueInArray($responseArray, FieldResponseHelper::FIELD_STATUS);
        $this->transferId = FormatHelper::getNumericValueInArray($responseArray, self::FIELD_DATA);
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getTransferId(): ?string
    {
        return $this->transferId;
    }

    public function isSuccess(): bool
    {
        return $this->status === EnumHelper::STATUS_OK && $this->transferId;
    }

    public function isError(): bool
    {
        return $this->status === EnumHelper::STATUS_ERROR;
    }

    public function isErrorInsufficientBalance(): bool
    {
        return $this->errorCode === EnumHelper::ERROR_CODE_INSUFFICIENT_BALANCE;
    }
}
