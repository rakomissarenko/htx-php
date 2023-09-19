<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class TradableMarketRequest extends AbstractRequest
{
    protected const PATH = '/v2/sub-user/tradable-market';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const SUB_UIDS_SIZE = 50;

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
        ValidateHelper::validateArraySize($this->subUids, FieldHelper::FIELD_SUB_UIDS, self::SUB_UIDS_SIZE);
        foreach ($this->subUids as $subUid) {
            ValidateHelper::validateInteger((string) $subUid, FieldHelper::FIELD_SUB_UIDS);
        }
        ValidateHelper::validateList($this->accountType, FieldHelper::FIELD_ACCOUNT_TYPE, EnumHelper::ACCOUNT_MARKET_TYPES);
        ValidateHelper::validateList($this->activation, FieldHelper::FIELD_ACTIVATION, EnumHelper::ACTIVATIONS);
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
