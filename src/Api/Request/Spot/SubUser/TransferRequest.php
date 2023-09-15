<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferRequest extends AbstractRequest
{
    private const FIELD_SUB_UID = 'sub-uid';
    private const FIELD_AMOUNT = 'amount';
    private const FIELD_TYPE = 'type';

    protected const PATH = '/v1/subuser/transfer';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const TYPE_MASTER_TRANSFER_IN = 'master-transfer-in';
    private const TYPE_MASTER_TRANSFER_OUT = 'master-transfer-out';
    private const TYPE_MASTER_POINT_TRANSFER_IN = 'master-point-transfer-in';
    private const TYPE_MASTER_POINT_TRANSFER_OUT = 'master-point-transfer-out';
    private const TYPES = [
        self::TYPE_MASTER_TRANSFER_IN,
        self::TYPE_MASTER_TRANSFER_OUT,
        self::TYPE_MASTER_POINT_TRANSFER_IN,
        self::TYPE_MASTER_POINT_TRANSFER_OUT,
    ];

    public function __construct(
        private string $subUid,
        private string $currency,
        private string $amount,
        private string $type,
        private string $clientOrderId,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateInteger($this->subUid, self::FIELD_SUB_UID);
        $this->validateNumeric($this->amount, self::FIELD_AMOUNT);
        $this->validateList($this->type, self::FIELD_TYPE, self::TYPES);
    }

    public function toArray(): array
    {
        return [
            self::FIELD_SUB_UID         => $this->subUid,
            self::FIELD_CURRENCY        => $this->currency,
            self::FIELD_AMOUNT          => $this->amount,
            self::FIELD_TYPE            => $this->type,
            self::FIELD_CLIENT_ORDER_ID => $this->clientOrderId,
        ];
    }
}
