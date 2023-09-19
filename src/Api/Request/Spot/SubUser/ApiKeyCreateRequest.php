<?php

namespace Feralonso\Htx\Api\Request\Spot\SubUser;

use Feralonso\Htx\Api\Helper\EnumHelper;
use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Api\Request\AbstractRequest;
use Feralonso\Htx\Exceptions\HtxValidateException;

class ApiKeyCreateRequest extends AbstractRequest
{
    protected const PATH = '/v2/sub-user/api-key-generation';
    protected const PERMISSION = self::PERMISSION_TRADE;

    private const OTP_TOKEN_SIZE = 6;
    private const NOTE_SIZE = 255;
    private const IPS_SIZE = 20;

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
        ValidateHelper::validateInteger($this->otpToken, FieldHelper::FIELD_OTP_TOKEN);
        ValidateHelper::validateMaxLength($this->otpToken, FieldHelper::FIELD_OTP_TOKEN, self::OTP_TOKEN_SIZE);
        ValidateHelper::validateInteger($this->subUid, FieldHelper::FIELD_SUB_UID);
        ValidateHelper::validateMaxLength($this->note, FieldHelper::FIELD_NOTE, self::NOTE_SIZE);
        foreach ($this->permission as $permission) {
            ValidateHelper::validateList((string) $permission, FieldHelper::FIELD_PERMISSION, EnumHelper::PERMISSIONS);
        }
        if (!in_array(EnumHelper::PERMISSION_KEY_READ_ONLY, $this->permission, true)) {
            ValidateHelper::throwValidateException(FieldHelper::FIELD_PERMISSION);
        }
        if ($this->ips) {
            ValidateHelper::validateArraySize($this->ips, FieldHelper::FIELD_IP, self::IPS_SIZE);
            ValidateHelper::validateArrayScalar($this->ips, FieldHelper::FIELD_IP);
            foreach ($this->ips as $ip) {
                ValidateHelper::validateIp((string) $ip, FieldHelper::FIELD_IP);
            }
        }
    }

    public function toArray(): array
    {
        $result = [
            FieldHelper::FIELD_OTP_TOKEN  => $this->otpToken,
            FieldHelper::FIELD_SUB_UID    => $this->subUid,
            FieldHelper::FIELD_NOTE       => $this->note,
            FieldHelper::FIELD_PERMISSION => implode(',', $this->permission),
        ];
        if ($this->ips) {
            $result[FieldHelper::FIELD_IP] = implode(',', $this->ips);
        }

        return $result;
    }
}
