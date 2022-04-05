<?php

namespace App\Services;

use Illuminate\Support\Carbon;

class BeerService
{
    /**
     * @param $hasVoucher
     * @param $timeOrder
     * @param $totalOrder
     * @return int
     */
    public function getPrice($hasVoucher, $timeOrder, $totalOrder)
    {
        $totalPrice = 0;
        if ($totalOrder == 0) {
            return $totalPrice;
        }

        if ($hasVoucher) {
            $totalPrice = 100;
            $totalOrder -= 1;
        }

        $start = Carbon::createFromTimeString('16:00');
        $end = Carbon::createFromTimeString('17:59');
        $timeOrder = Carbon::createFromTimeString($timeOrder);
        if ($timeOrder->isBetween($start, $end)) {
            $totalPrice += $totalOrder * 290;
        } else {
            $totalPrice += $totalOrder * 490;
        }
        return $totalPrice;
    }
}
