<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class Session3Test extends TestCase
{
	use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
    	$data = array("name" => $this->faker->firstName(),
        "email" => $this->faker->email(),
        "password" => bcrypt('secret')
        );
        $user = factory(User::class)->create($data);
        $this->assertInstanceOf(User::class, $user);
    }
}
