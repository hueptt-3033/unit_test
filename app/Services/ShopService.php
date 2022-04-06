<?php

namespace App\Services;

class ShopService
{
    /**
     * @param $totalProduct
     * @param $hasShirt
     * @param $hasTie
     * @return float|int
     */
    public function getDiscount($totalProduct, $hasShirt, $hasTie)
    {
        $totalDiscount = 0;

        if ($totalProduct <= 0) {
            return 0;
        }

        if ($totalProduct >= 7) {
            $totalDiscount += 0.07;
        }

        if ($hasShirt && $hasTie) {
            $totalDiscount += 0.05;
        }

        return $totalDiscount;
    }
}
