<?php

namespace Feralonso\Htx\Api\Helper;

use Feralonso\Htx\Exceptions\HtxValidateException;

class ValidateHelper
{
    /**
     * @throws HtxValidateException
     */
    public static function validateInteger(string $value, string $name): void
    {
        if (preg_match('/\D+/', $value)) {
            self::throwValidateException($name);
        }
    }

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
    public static function validateRange(string $value, string $name, ?string $min = null, ?string $max = null): void
    {
        if (($min !== null && $value < $min) || ($max !== null && $value > $max)) {
            self::throwValidateException($name);
        }
    }

    /**
     * @throws HtxValidateException
     */
    public static function validateMaxLength(string $value, string $name, int $maxLength): void
    {
        if (mb_strlen($value) > $maxLength) {
            self::throwValidateException($name);
        }
    }

    /**
     * @throws HtxValidateException
     */
    public static function validateArrayScalar(array $value, string $name): void
    {
        foreach ($value as $type) {
            if (!is_scalar($type)) {
                self::throwValidateException($name);
            }
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
