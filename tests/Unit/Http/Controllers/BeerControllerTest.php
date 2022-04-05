<?php

namespace Tests\Unit\Http\Controllers;

use App\Services\BeerService;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class BeerControllerTest extends TestCase
{
    /**
     * @var BeerService
     */
    protected $beerService;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->beerService = new BeerService();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_price_in_promotion_time_with_voucher()
    {
        $this->assertEquals(100+9*290, $this->beerService->getPrice(true, '17:00', 10));
    }

    public function test_get_price_in_promotion_time_without_voucher()
    {
        $this->assertEquals(290*10, $this->beerService->getPrice(false, '17:00', 10));
    }

    public function test_get_price_not_in_promotion_time_with_voucher()
    {
        $this->assertEquals(100+490*9, $this->beerService->getPrice(true, '15:00', 10));
    }

    public function test_get_price_not_in_promotion_time_without_voucher()
    {
        $this->assertEquals(490*10, $this->beerService->getPrice(false, '15:00', 10));
    }

    public function test_get_price_boundary_time_min_with_voucher()
    {
        $this->assertEquals(100+290*9, $this->beerService->getPrice(true, '16:00', 10));
    }

    public function test_get_price_boundary_time_min_without_voucher()
    {
        $this->assertEquals(290*10, $this->beerService->getPrice(false, '16:00', 10));
    }

    public function test_get_price_boundary_time_max_with_voucher()
    {
        $this->assertEquals(100+290*9, $this->beerService->getPrice(true, '17:59', 10));
    }

    public function test_get_price_boundary_time_max_without_voucher()
    {
        $this->assertEquals(290*10, $this->beerService->getPrice(false, '17:59', 10));
    }

    public function test_get_price_without_total_oder()
    {
        $this->assertEquals(0, $this->beerService->getPrice('', '', 0));
    }
}
