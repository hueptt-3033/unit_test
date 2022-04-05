<?php

namespace Tests\Unit\Http\Controllers;

use App\Services\AtmService;
use PHPUnit\Framework\TestCase;

class AtmControllerTest extends TestCase
{
    /**
     * @var AtmService
     */
    protected $atmService;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->atmService = new AtmService();
    }

    public function test_get_tax_normal_time_and_normal_day_with_vip()
    {
        $this->assertEquals(0, $this->atmService->getTax('2022-04-05 13:00', true, false));
    }

    public function test_get_tax_normal_time_and_normal_day_without_vip()
    {
        $this->assertEquals(0, $this->atmService->getTax('2022-04-05 13:00', false, false));
    }

    public function test_get_tax_normal_time_and_weekend_with_vip()
    {
        $this->assertEquals(0, $this->atmService->getTax('2022-04-02 13:00', true, false));
    }

    public function test_get_tax_normal_time_and_weekend_without_vip()
    {
        $this->assertEquals(110, $this->atmService->getTax('2022-04-02 13:00', false, false));
    }

    public function test_get_tax_normal_time_and_holiday_with_vip()
    {
        $this->assertEquals(0, $this->atmService->getTax('2022-04-10 13:00', true, true));
    }

    public function test_get_tax_normal_time_and_holiday_without_vip()
    {
        $this->assertEquals(110, $this->atmService->getTax('2022-04-10 13:00', false, true));
    }

    public function test_get_tax_boundary_normal_time_min_and_normal_day_with_vip()
    {
        $this->assertEquals(0, $this->atmService->getTax('2022-04-05 08:45', true, false));
    }

    public function test_get_tax_boundary_normal_time_max_and_normal_day_without_vip()
    {
        $this->assertEquals(0, $this->atmService->getTax('2022-04-05 17:59', false, false));
    }

    public function test_get_tax_abnormal_time_normal_day_with_vip()
    {
        $this->assertEquals(0, $this->atmService->getTax('2022-04-05 19:00', true, false));
    }

    public function test_get_tax_abnormal_time_normal_day_without_vip()
    {
        $this->assertEquals(110, $this->atmService->getTax('2022-04-05 19:00', false, false));
    }

    public function test_get_tax_abnormal_time_normal_day_with_holiday()
    {
        $this->assertEquals(110, $this->atmService->getTax('2022-04-05 19:00', false, true));
    }

    public function test_get_tax_abnormal_time_normal_day_without_holiday()
    {
        $this->assertEquals(110, $this->atmService->getTax('2022-04-05 19:00', false, false));
    }
}
