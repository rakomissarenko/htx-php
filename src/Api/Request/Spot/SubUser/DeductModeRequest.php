<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class DeductModeRequest extends AbstractRequest
{
    protected const PATH = '/v2/sub-user/deduct-mode';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const SUB_UIDS_SIZE = 50;

    private const DEDUCT_MODE_MASTER = 'master';
    private const DEDUCT_MODE_SUB = 'sub';
    private const DEDUCT_MODES = [
        self::DEDUCT_MODE_MASTER,
        self::DEDUCT_MODE_SUB,
    ];

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
        $this->validateList($this->deductMode, FieldHelper::FIELD_DEDUCT_MODE, self::DEDUCT_MODES);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SUB_UIDS    => implode(',', $this->subUids),
            FieldHelper::FIELD_DEDUCT_MODE => $this->deductMode,
        ];
    }
}
