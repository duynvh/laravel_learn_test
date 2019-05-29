<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserModelTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_has_full_name_attribute()
    {
        // create user
        $user = User::create(['firstname' => 'Duy', 'lastname' => 'NVH', 'email' => 'nguyenvohoangduy@gmail.com', 'password' => '123456']);

        $this->assertEquals('Duy NVH', $user->fullname);
    }
}
