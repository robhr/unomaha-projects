<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EndpointTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * GET: `/api/projects`
     *
     * @return void
     */
    public function testApiProjects()
    {
        $this->json('GET', '/api/projects', [])->assertOk();
    }

    /**
     * GET: `/api/project/{id}`
     *
     * @return void
     */
    public function testApiProject()
    {
        $this->json('GET', '/api/project/1', [])->assertOk();
    }

    /**
     * GET: `/api/project/{id}/customers`
     *
     * @return void
     */
    public function testApiProjectCustomers()
    {
        $this->json('GET', '/api/project/1/customers', [])->assertOk();
    }

    /**
     * GET: `/api/customer/{id}/report`
     *
     * @return void
     */
    public function testApiCustomerReport()
    {
        $this->json('GET', '/api/customer/1/report', [])->assertOk();
    }

    /**
     * GET: `/api/logs`
     *
     * @return void
     */
    public function testApiLogs()
    {
        $this->json('GET', '/api/logs', [])->assertOk();
    }

     /**
     * GET: `/api/metrics/purchases`
     *
     * @return void
     */
    public function testApiMetricsPurchases()
    {
        $this->json('GET', '/api/metrics/purchases', [])->assertOk();
    }
}
