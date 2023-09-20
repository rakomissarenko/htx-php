<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\FieldHelper;
use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Exceptions\HtxValidateException;

class UserData
{
    private const PATTERN_USER_NAME = '/(\da-zA-Z)+/';

    private const USER_NAME_SIZE_MIN = 6;
    private const USER_NAME_SIZE_MAX = 20;

    private const NOTE_SIZE_MAX = 20;

    public function __construct(
        private string $userName,
        private string $note,
    ) {}

    /**
     * @throws HtxValidateException
     */
    public function validate(): void
    {
        ValidateHelper::validateRange(
            (string) mb_strlen($this->userName),
            FieldHelper::FIELD_USER_NAME,
            (string) self::USER_NAME_SIZE_MIN,
            (string) self::USER_NAME_SIZE_MAX,
        );
        ValidateHelper::validatePattern($this->userName, FieldHelper::FIELD_USER_NAME, self::PATTERN_USER_NAME);
        if (is_int(mb_substr($this->userName, 0, 1))) {
            ValidateHelper::throwValidateException(FieldHelper::FIELD_USER_NAME);
        }
        ValidateHelper::validateNotEmptyString($this->note, FieldHelper::FIELD_NOTE);
        ValidateHelper::validateMaxLength($this->note, FieldHelper::FIELD_NOTE, self::NOTE_SIZE_MAX);
    }

    public function toArray(): array
    {
        return [
            FieldHelper::FIELD_USER_NAME => $this->userName,
            FieldHelper::FIELD_NOTE      => $this->note,
        ];
    }
}
