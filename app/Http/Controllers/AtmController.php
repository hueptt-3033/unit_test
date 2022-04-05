<?php

namespace App\Http\Controllers;

use App\Services\AtmService;
use Illuminate\Http\Request;

class AtmController extends Controller
{
    /**
     * @var AtmService
     */
    protected $atmService;

    /**
     * @param AtmService $atmService
     */
    public function __construct(AtmService $atmService)
    {
        $this->atmService = $atmService;
    }

    /**
     * @param $date
     * @param $isVip
     * @param $isHoliday
     * @return void
     */
    public function getTax($date, $isVip, $isHoliday)
    {
        $this->atmService->getTax($date, $isVip, $isHoliday);
    }
}
