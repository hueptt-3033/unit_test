<?php

namespace App\Services;

use Illuminate\Support\Carbon;

class AtmService
{
    /**
     * @param $date
     * @param $isVip
     * @param $isHoliday
     * @return int
     */
    public function getTax($date, $isVip, $isHoliday)
    {
        if ($isVip) {
            return 0;
        }

        if (Carbon::createFromTimeString($date)->isWeekend() || $isHoliday) {
            return 110;
        }

        $time = Carbon::createFromTimeString($date);
        $startTimeFree = Carbon::createFromTimeString('08:45');
        $endTimeFree = Carbon::createFromTimeString('17:59');
        if ($time->isBetween($startTimeFree, $endTimeFree)) {
            return 0;
        }
        return 110;
    }
}
