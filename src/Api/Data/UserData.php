<?php

namespace Feralonso\Htx\Api\Data;

use Feralonso\Htx\Api\Helper\ValidateHelper;
use Feralonso\Htx\Exceptions\HtxValidateException;

class UserData
{
    private const FIELD_USER_NAME = 'userName';
    private const FIELD_NOTE = 'note';

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
            self::FIELD_USER_NAME,
            (string) self::USER_NAME_SIZE_MIN,
            (string) self::USER_NAME_SIZE_MAX,
        );
        ValidateHelper::validatePattern($this->userName, self::FIELD_USER_NAME, self::PATTERN_USER_NAME);
        if (is_int(mb_substr($this->userName, 0, 1))) {
            ValidateHelper::throwValidateException(self::FIELD_USER_NAME);
        }
        ValidateHelper::validateMaxLength($this->note, self::FIELD_NOTE, self::NOTE_SIZE_MAX);
    }

    public function toArray(): array
    {
        return [
            self::FIELD_USER_NAME => $this->userName,
            self::FIELD_NOTE      => $this->note,
        ];
    }
}
