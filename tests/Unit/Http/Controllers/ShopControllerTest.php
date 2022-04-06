<?php

namespace Tests\Unit\Http\Controllers;

use App\Services\ShopService;
use PHPUnit\Framework\TestCase;

class ShopControllerTest extends TestCase
{
    /**
     * @var ShopService
     */
    protected $shopService;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->shopService = new ShopService();
    }

    /**
     * @return void
     */
    public function test_get_discount_with_shirt_and_tie()
    {
        $this->assertEquals(0.12, $this->shopService->getDiscount(10, true, true));
    }

    /**
     * @return void
     */
    public function test_get_discount_with_shirt_and_without_tie()
    {
        $this->assertEquals(0.07, $this->shopService->getDiscount(10, true, false));
    }

    /**
     * @return void
     */
    public function test_get_discount_without_shirt_and_with_tie()
    {
        $this->assertEquals(0.07, $this->shopService->getDiscount(10, false, true));
    }

    /**
     * @return void
     */
    public function test_get_discount_without_shirt_and_tie()
    {
        $this->assertEquals(0.07, $this->shopService->getDiscount(10, false, false));
    }

    /**
     * @return void
     */
    public function test_get_discount_without_full_product_with_shirt_and_tie()
    {
        $this->assertEquals(0.05, $this->shopService->getDiscount(5, true, true));
    }

    /**
     * @return void
     */
    public function test_get_discount_without_full_product_with_shirt_without_tie()
    {
        $this->assertEquals(0, $this->shopService->getDiscount(5, true, false));
    }

    /**
     * @return void
     */
    public function test_get_discount_without_full_product_without_shirt_with_tie()
    {
        $this->assertEquals(0, $this->shopService->getDiscount(5, false, true));
    }

    /**
     * @return void
     */
    public function test_get_discount_without_full_product_without_shirt_tie()
    {
        $this->assertEquals(0, $this->shopService->getDiscount(5, false, false));
    }

    /**
     * @return void
     */
    public function test_get_discount_without_total_product()
    {
        $this->assertEquals(0, $this->shopService->getDiscount(0, false, false));
    }

    public function test_boundary_with_shirt_and_tie()
    {
        $this->assertEquals(0.12, $this->shopService->getDiscount(7, true, true));
    }

    public function test_boundary_with_shirt_without_tie()
    {
        $this->assertEquals(0.07, $this->shopService->getDiscount(7, true, false));
    }

    public function test_boundary_without_shirt_with_tie()
    {
        $this->assertEquals(0.07, $this->shopService->getDiscount(7, false, true));
    }

    public function test_boundary_without_shirt_tie()
    {
        $this->assertEquals(0.07, $this->shopService->getDiscount(7, false, false));
    }

    public function test_get_discount_less_than_zero_product()
    {
        $this->assertEquals(0, $this->shopService->getDiscount(-10, true, true));
    }
}
