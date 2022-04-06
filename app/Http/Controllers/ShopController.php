<?php

namespace App\Http\Controllers;

use App\Services\ShopService;
use Illuminate\Http\Request;
use function Psy\sh;

class ShopController extends Controller
{
    /**
     * @var ShopService
     */
    protected $shopService;

    /**
     * @param ShopService $shopService
     */
    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    /**
     * @param $totalProduct
     * @param $hasShirt
     * @param $hasTie
     * @return void
     */
    public function getDiscount($totalProduct, $hasShirt, $hasTie)
    {
        $this->shopService->getDiscount($totalProduct, $hasShirt, $hasTie);
    }
}
