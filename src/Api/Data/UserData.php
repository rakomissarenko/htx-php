<?php

namespace Feralonso\Htx\Api\Data;

class UserData
{
    private const FIELD_USER_NAME = 'userName';
    private const FIELD_NOTE = 'note';

    private const USER_NAME_SIZE_MIN = 6;
    private const USER_NAME_SIZE_MAX = 20;

    private const NOTE_SIZE_MAX = 20;

    public function __construct(
        private string $userName,
        private string $note,
    ) {}

    public function validate(): void
    {
        $sizeUserName = mb_strlen($this->userName);
        if ($sizeUserName < self::USER_NAME_SIZE_MIN || $sizeUserName > self::USER_NAME_SIZE_MAX) {
            //
        }
        if (!preg_match('/(\da-zA-Z)+/', $this->userName) || is_int(mb_substr($this->userName, 0, 1))) {
            //
        }
        if (mb_strlen($this->note) > self::NOTE_SIZE_MAX) {
            //
        }
    }

    public function toArray(): array
    {
        return [
            self::FIELD_USER_NAME => $this->userName,
            self::FIELD_NOTE      => $this->note,
        ];
    }
}
