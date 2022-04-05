<?php

namespace App\Http\Controllers;

use App\Services\BeerService;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * @var BeerService
     */
    protected $beerService;

    /**
     * @param BeerService $beerService
     */
    public function __construct(BeerService $beerService)
    {
        $this->beerService = $beerService;
    }

    /**
     * @param $hasVoucher
     * @param $timeOrder
     * @param $totalOrder
     * @return void
     */
    public function getPrice($hasVoucher, $timeOrder, $totalOrder)
    {
        $this->beerService->getPrice($hasVoucher, $timeOrder, $totalOrder);
    }
}
