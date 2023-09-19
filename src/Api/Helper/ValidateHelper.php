<?php

namespace Feralonso\Htx\Api\Helper;

use Feralonso\Htx\Exceptions\HtxValidateException;

class ValidateHelper
{
    /**
     * @throws HtxValidateException
     */
    public static function validateNumeric(string $value, string $name): void
    {
        if (!is_numeric($value)) {
            self::throwValidateException($name);
        }
    }

    /**
     * @throws HtxValidateException
     */
    public static function validateList(string $value, string $name, array $list): void
    {
        if (!in_array($value, $list, true)) {
            self::throwValidateException($name);
        }
    }

    /**
     * @throws HtxValidateException
     */
    public static function throwValidateException(string $name): void
    {
        throw new HtxValidateException(
            HtxValidateException::getErrorMessage($name),
            HtxValidateException::ERROR_INPUT_VALUE_INVALID
        );
    }
}
