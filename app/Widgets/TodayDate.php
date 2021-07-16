<?php

namespace App\Widgets;

use App\NepaliCalender;

class TodayDate
{

    public static function nepali()
    {
        date_default_timezone_set('Asia/Kathmandu');
        $yy = date('Y');
        $mm = date('m');
        $dd = date('d');
        $dateClass = new NepaliCalender();
        return $dateClass->getTodayDate($yy, $mm, $dd);
    }
}
