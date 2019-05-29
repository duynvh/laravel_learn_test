<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Beverage;
use App\User;
use App\Exceptions\MinorCanNotBuyAlcoholicBeverageException;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;
    protected $beverage;

    public function setUp(): void
    {
        parent::setUp();
        $this->beverage = factory(Beverage::class)->make();
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function beverage_has_name(): void
    {
        $this->assertNotEmpty($this->beverage->name);
    }

    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function beverage_has_type(): void
    {
        $this->assertNotEmpty($this->beverage->type);
    }

     /** @test */
     public function a_minor_user_can_not_but_alcoholic_beverage()
     {
        $beverage = factory(Beverage::class)->make([
            'type' => 'Alcoholic'
        ]);

        $user = factory(User::class)->make([
            'age' => 17
        ]);

        // Logged In
        $this->actingAs($user);

        // Expect exception
        $this->expectException(MinorCanNotBuyAlcoholicBeverageException::class);

        $beverage->buy();
     }
}
