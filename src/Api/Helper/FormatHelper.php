<?php

namespace Feralonso\Htx\Api\Helper;

use DateTime;
use Exception;

class FormatHelper
{
    public const SCALE_SIZE = 8;

    public static function getIntValueInArray(array $array, string $key): ?int
    {
        return isset($array[$key]) && is_numeric($array[$key]) ? (int) $array[$key] : null;
    }

    public static function getStringValueInArray(array $array, string $key): ?string
    {
        return isset($array[$key]) && is_scalar($array[$key]) ? (string) $array[$key] : null;
    }

    public static function getArrayValueInArray(array $array, string $key): ?array
    {
        return isset($array[$key]) && is_array($array[$key]) ? $array[$key] : null;
    }

    public static function getBoolValueInArray(array $array, string $key): ?bool
    {
        return isset($array[$key]) && is_scalar($array[$key]) ? (bool) $array[$key] : null;
    }

    public static function getNumericValueInArray(array $array, string $key): ?string
    {
        return isset($array[$key]) && is_numeric($array[$key]) ? (string) $array[$key] : null;
    }

    public static function getDateTimeValueInArray(array $array, string $key): ?DateTime
    {
        $result = null;

        if (!empty($array[$key]) && is_scalar($array[$key])) {
            try {
                $result = new DateTime($array[$key]);
            } catch (Exception) {
            }
        }

        return $result;
    }
}
