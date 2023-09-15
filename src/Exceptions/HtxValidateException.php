<?php

namespace Feralonso\Htx\Exceptions;

use Exception;

class HtxValidateException extends Exception
{
    public const ERROR_INPUT_VALUE_INVALID = 502;

    public static function getErrorMessage(string $fieldName): string
    {
        return 'Invalid ' . $fieldName;
    }
}