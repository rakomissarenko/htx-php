<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class DeductModeRequest extends AbstractRequest
{
    protected const PATH = '/v2/sub-user/deduct-mode';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const SUB_UIDS_SIZE = 50;

    public function __construct(
        private array $subUids,
        private string $deductMode,
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
        ValidateHelper::validateList($this->deductMode, FieldHelper::FIELD_DEDUCT_MODE, EnumHelper::DEDUCT_MODES);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SUB_UIDS    => implode(',', $this->subUids),
            FieldHelper::FIELD_DEDUCT_MODE => $this->deductMode,
        ];
    }
}
