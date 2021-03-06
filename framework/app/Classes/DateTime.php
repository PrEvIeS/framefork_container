<?php

namespace App\Classes;

class DateTime extends \DateTime
{
    /**
     * @param string $date
     * @return false|string
     */
    public static function dateAfterWeek(string $date)
    {
        if (($dateAt = strtotime('+1 week', strtotime($date))) === false) {
            return "Строка ($date) недопустима";
        }

        return date('d.m.Y', $dateAt);
    }

    /**
     * @param string $date
     * @return false|string
     */
    public static function dateAfterMonth(string $date)
    {
        if (($dateAt = strtotime('+1 month', strtotime($date))) === false) {
            return "Строка ($date) недопустима";
        }

        return date('d.m.Y', $dateAt);
    }

    /**
     * @param string $date
     * @return false|string
     */
    public static function getStartOfDay(string $date)
    {
        if (($timestamp = strtotime($date)) === false) {
            return "Строка ($date) недопустима";
        }
        return date('d.m.Y 00:00:00', $timestamp);
    }

    /**
     * @param string $date
     * @return false|string
     */
    public static function getEndOfDay(string $date)
    {
        if (($timestamp = strtotime($date)) === false) {
            return "Строка ($date) недопустима";
        }
        return date('d.m.Y 23:59:59', $timestamp);
    }
}