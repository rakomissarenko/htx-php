<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ApiKeyCreateRequest extends AbstractRequest
{
    private const FIELD_OTP_TOKEN = 'otpToken';
    private const FIELD_PERMISSION = 'permission';
    private const FIELD_IP = 'ipAddresses';

    protected const PATH = '/v2/sub-user/api-key-generation';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const OTP_TOKEN_SIZE = 6;
    private const NOTE_SIZE = 255;
    private const IPS_SIZE = 20;

    private const PERMISSION_KEY_READ_ONLY = 'readOnly';
    private const PERMISSION_KEY_TRADE = 'trade';
    private const PERMISSIONS = [
        self::PERMISSION_KEY_READ_ONLY,
        self::PERMISSION_KEY_TRADE,
    ];

    private ?array $ips = null;

    public function __construct(
        private string $otpToken,
        private string $subUid,
        private string $note,
        private array $permission,
    ) {}

    public function setIps(array $ips): void
    {
        $this->ips = $ips;
    }

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        $this->validateInteger($this->otpToken, self::FIELD_OTP_TOKEN);
        $this->validateSize($this->otpToken, self::FIELD_OTP_TOKEN, self::OTP_TOKEN_SIZE);
        $this->validateInteger($this->subUid, FieldHelper::FIELD_SUB_UID);
        if (mb_strlen($this->note) > self::NOTE_SIZE) {
            $this->throwValidateException(FieldHelper::FIELD_NOTE);
        }
        foreach ($this->permission as $permission) {
            $this->validateList($permission, self::FIELD_PERMISSION, self::PERMISSIONS);
        }
        if (!in_array(self::PERMISSION_KEY_READ_ONLY, $this->permission, true)) {
            $this->throwValidateException(self::FIELD_PERMISSION);
        }
        if ($this->ips) {
            if (count($this->ips) > self::IPS_SIZE) {
                $this->throwValidateException(self::FIELD_IP);
            }
            foreach ($this->ips as $ip) {
                if (!is_scalar($ip) || !filter_var($ip, FILTER_VALIDATE_IP)) {
                    $this->throwValidateException(self::FIELD_IP);
                }
            }
        }
    }

    public function toArray(): array
    {
        $result = [
            self::FIELD_OTP_TOKEN      => $this->otpToken,
            FieldHelper::FIELD_SUB_UID => $this->subUid,
            FieldHelper::FIELD_NOTE    => $this->note,
            self::FIELD_PERMISSION     => implode(',', $this->permission),
        ];
        if ($this->ips) {
            $result[self::FIELD_IP] = implode(',', $this->ips);
        }

        return $result;
    }
}
