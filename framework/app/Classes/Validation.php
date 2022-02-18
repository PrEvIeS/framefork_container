<?php

namespace App\Classes;

class Validation
{
    /**
     * @param $input
     * @return bool
     */
    public static function isNumeric($input): bool
    {
        if (preg_match('/^\d+$/', $input)) {
            return true;
        }
        return false;
    }

    /**
     * @param $input
     * @return bool
     */
    public static function isEmail($input): bool
    {
        if (preg_match('/\w+@\w+\.\w+/', $input)) {
            return true;
        }
        return false;
    }

    /**
     * @param $input
     * @return bool
     */
    public static function isString($input): bool
    {
        if (preg_match('/^[а-яёА-ЯЁ]+$/u', $input)) {
            return true;
        }
        return false;
    }

    /**
     * @param $input
     * @return bool
     */
    public static function isRegExp($reg,$string): bool
    {
        if (preg_match("$reg", $string)) {
            return true;
        }
        return false;
    }
}