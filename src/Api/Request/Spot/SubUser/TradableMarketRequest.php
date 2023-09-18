<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TradableMarketRequest extends AbstractRequest
{
    protected const PATH = '/v2/sub-user/tradable-market';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const SUB_UIDS_SIZE = 50;

    private const ACCOUNT_TYPE_CROSS = 'cross-margin';
    private const ACCOUNT_TYPE_ISOLATED = 'isolated-margin';
    private const ACCOUNT_TYPES = [
        self::ACCOUNT_TYPE_CROSS,
        self::ACCOUNT_TYPE_ISOLATED,
    ];

    public function __construct(
        private array $subUids,
        private string $accountType,
        private string $activation,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        foreach ($this->subUids as $subUid) {
            $this->validateInteger((string) $subUid, FieldHelper::FIELD_SUB_UIDS);
        }
        if (count($this->subUids) > self::SUB_UIDS_SIZE) {
            $this->throwValidateException(FieldHelper::FIELD_SUB_UIDS);
        }
        $this->validateList($this->accountType, FieldHelper::FIELD_ACCOUNT_TYPE, self::ACCOUNT_TYPES);
        $this->validateList($this->activation, FieldHelper::FIELD_ACTIVATION, EnumHelper::ACTIVATIONS);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SUB_UIDS     => implode(',', $this->subUids),
            FieldHelper::FIELD_ACCOUNT_TYPE => $this->accountType,
            FieldHelper::FIELD_ACTIVATION   => $this->activation,
        ];
    }
}
