<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Beverage;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;

    protected $beverage;

    protected function setUp(): void
    {
        parent::setUp();
        $this->beverage = factory(Beverage::class)->create();
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function a_user_can_visit_a_beverage_page_and_see_bevereages(): void
    {
        // User will go to url
        $response = $this->get('/beverage');
        
        $response->assertSee($this->beverage->name);

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_visit_a_single_beverage_page(): void
    {
        $response = $this->get("/beverage/" . $this->beverage->id);

        $response->assertSee($this->beverage->name);

        $response->assertStatus(200);
    }

    /** @test */ 
    public function a_logged_in_user_can_buy_beverage() 
    {
        $this->authenticate();

        $data = [
            'beverage_id'   => $this->beverage->id,
            'price'         => 200
        ];

        $response = $this->post('/beverage/buy', $data);

        $this->assertDatabaseHas('purchases', $data);

        $response->assertStatus(201);
    }
}
