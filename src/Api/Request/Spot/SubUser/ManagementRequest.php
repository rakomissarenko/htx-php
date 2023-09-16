<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ManagementRequest extends AbstractRequest
{
    private const FIELD_ACTION = 'action';

    protected const PATH = '/v2/sub-user/management';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const ACTION_LOCK = 'lock';
    private const ACTION_UNLOCK = 'unlock';
    private const ACTIONS = [
        self::ACTION_LOCK,
        self::ACTION_UNLOCK,
    ];

    public function __construct(
        private string $subUid,
        private string $action,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateInteger($this->subUid, FieldHelper::FIELD_SUB_UID);
        $this->validateList($this->action, self::FIELD_ACTION, self::ACTIONS);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_SUB_UID => $this->subUid,
            self::FIELD_ACTION         => $this->action,
        ];
    }
}
