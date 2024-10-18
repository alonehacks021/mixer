<?php

namespace Nahad\Foundation\Dashboard\Support;

class Calendar {
    public static function getFirstDayOfWeek($dateTime = null) {
        $jdate = $dateTime ? jdate()->fromDateTime($dateTime) : jdate();

        return $jdate->subDays($jdate->getDayOfWeek());
    }

    public static function getLastDayOfWeek($dateTime = null) {
        $jdate = $dateTime ? jdate()->fromDateTime($dateTime) : jdate();

        return $jdate->addDays(6 - $jdate->getDayOfWeek());
    }
}