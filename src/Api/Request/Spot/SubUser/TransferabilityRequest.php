<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TransferabilityRequest extends AbstractRequest
{
    private const FIELD_ACCOUNT_TYPE = 'accountType';
    private const FIELD_SUB_UIDS = 'subUids';
    private const FIELD_TRANSFERRABLE = 'transferrable';

    protected const PATH = '/v2/sub-user/transferability';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const SUB_UIDS_SIZE = 50;

    private const ACCOUNT_TYPE_SPOT = 'spot';
    private const ACCOUNT_TYPES = [
        self::ACCOUNT_TYPE_SPOT,
    ];

    public function __construct(
        private array $subUids,
        private string $accountType,
        private bool $transferrable,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        foreach ($this->subUids as $subUid) {
            $this->validateInteger((string) $subUid, self::FIELD_SUB_UIDS);
        }
        if (count($this->subUids) > self::SUB_UIDS_SIZE) {
            $this->throwValidateException(self::FIELD_SUB_UIDS);
        }
        $this->validateList($this->accountType, self::FIELD_ACCOUNT_TYPE, self::ACCOUNT_TYPES);
    }

    public function toArray(): array
    {
        return [
            self::FIELD_SUB_UIDS      => implode(',', $this->subUids),
            self::FIELD_ACCOUNT_TYPE  => $this->accountType,
            self::FIELD_TRANSFERRABLE => $this->transferrable,
        ];
    }
}
